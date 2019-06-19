@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>

                @if(session('status'))
                    <span class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </span>
                @endif
                
                <div class="card-body">

                    <form method="POST" action="{{ route('edit_user_post') }}">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{$user->id}}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" required autocomplete="off" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick/Nombre de usuario') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ $user->user_name }}" required autocomplete="off" autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select class="col-md-12 form-control @error('role') is-invalid @enderror" id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="off" autofocus>
                                      <option value="{{$user->role->id}}" selected>{{$user->role->role}}</option>
                                      @foreach($roles as $role)
                                        @if($user->role->role != $role->role)
                                            <option value="{{$role->id}}">{{ucwords($role->role)}}</option>
                                        @endif
                                      @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <select class="col-md-12 form-control @error('city') is-invalid @enderror" id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="off" autofocus>
                                      <option value="{{$user->city->id}}" selected>{{$user->city->city}}</option>
                                      @foreach($cities as $city)
                                        @if($user->city->city != $city->city )
                                            <option value="{{$city->id}}">{{ucwords($city->city)}}</option>
                                        @endif
                                      @endforeach
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar Usuario') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar sus pasatiempos</div>
            
                <div class="card-body">
                    <form method="POST" action="{{ route('hobbies_post') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        @foreach($hobbies as $hobby)
                            @if($user->UserHobbies != '[]' )
                                @foreach($user->UserHobbies as $userHobby)
                                    @if($hobby->id == $userHobby->id)
                                        <div class="col-sm">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="{{$hobby->id}}" name="hob[]" checked="checked">
                                              <label class="form-check-label" for="defaultCheck1">
                                                    {{ $hobby->hobby }}
                                              </label>
                                            </div>
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                                
                                @if($hobby->id != $userHobby->id)
                                    <div class="col-sm">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="{{$hobby->id}}" name="hob[]">
                                          <label class="form-check-label" for="defaultCheck1">
                                                {{ $hobby->hobby }}
                                          </label>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-sm">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="{{$hobby->id}}" name="hob[]">
                                      <label class="form-check-label" for="defaultCheck1">
                                            {{ $hobby->hobby }}
                                      </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <br/>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-0">
                                <button type="submit" class="btn btn-primary">Editar Pasatiempos</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
