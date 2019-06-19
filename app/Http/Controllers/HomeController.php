<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ValidHobbieRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\City;
use App\Role;
use App\Hobby;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $hobbies = Auth::user()->UserHobbies;

        $users   = User::where('id','!=',$id)->get();

        return view('home',compact('hobbies','users'));
    }


    public function register()
    {
        $roles = Role::all();
        $cities  = City::all();

        return view('register',compact('roles','cities'));
    }
    public function register_post(RegisterUserRequest $request)
    {
        $userCreate =   User::create([
                            'name' => $request->name,
                            'lastname' => $request->lastname,
                            'user_name' => $request->nick,
                            'email' => $request->email,
                            'role_id' => $request->role,
                            'city_id' => $request->city,
                            'password' => Hash::make($request->password)
                        ]);

        if($userCreate->save())
        {
            return back()->with(['status' => 'EL usuario ha sido creado exitosamente']);
        }
    }


    public function edit_user($id)
    {
        $user = User::where('id',$id)
                    ->with(['Role','City','UserHobbies'])
                    ->get()[0];

        $roles = Role::all();

        $cities  = City::all();

        $hobbies = Hobby::all();

        return view('editUser',compact('user','roles','cities','hobbies'));
    }
    public function edit_user_post(EditUserRequest $request)
    {
        $userEdit = User::findOrFail($request->id);

        $userEdit->fill([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'user_name' => $request->nick,
            'email' => $request->email,
            'role_id' => $request->role,
            'city_id' => $request->city,
        ]);

        if($request->password != null)
        {
             $userEdit->fill([
                'password' => Hash::make($request->password)
             ]);
        }

        if($userEdit->save())
        {
            return back()->with(['status' => 'EL usuario ha sido editado exitosamente']);
        }
    }


    public function hobbies()
    {
        $hobbies = Hobby::all();
        $user    = Auth::user();

        return view('hobbies',compact('hobbies','user'));
    }
    public function hobbies_post(ValidHobbieRequest $request)
    {
        $user     = User::findOrFail($request->id);

        $findUser = $user::findOrFail($user->id);

        $listHobbies = $request->input('hob');

        $actualHobbies = $user->UserHobbies;

        if($actualHobbies != '')
        {
            foreach($actualHobbies as $actualHobby)
            {
                $findUser->UserHobbies()->detach($actualHobby);
            }
        }

        if($listHobbies != '')
        {
            foreach($listHobbies as $listHobby) 
            {
                $findUser->UserHobbies()->attach($listHobby);
            }
        }
        
        return back()->with('status', 'Los pasatiempos han sido asignados');
    }

    public function show_user($nick)
    {
        $user = $this->findByNick($nick);
        $hobbies = $user->UserHobbies;

        return view('showUser',compact('user','hobbies'));
    }




    //utilities privates 
    private function findByNick($nick)
    {
        return User::where('user_name',$nick)->get()[0];
    }
}