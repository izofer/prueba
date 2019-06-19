<div class="container">
	  <div class="row">
		    <div class="col-lg-8">
		      <h5><strong>Tus Pasatiempos</strong></h5>
		    </div>

		    <div class="col-sm">
		      <h5><strong>Usuarios registrados</strong></h5>
		    </div>
	  </div>

	  <div class="row">
		    <div class="col-lg-8">
		      	@forelse($hobbies as $hobby)
		      		<label> {{$hobby->hobby}} </label><br>
		      	@empty
		      		<strong>Aun no posees ningun Pasatiempo registrado</strong>
		      	@endforelse
		    </div>

		    <div class="col-sm">
		      	@forelse($users as $user)
		      		<a href="{{route('show_user',$user->user_name)}}">
		      			{{$user->user_name}}
		      		</a>
					
					@if(Auth::user()->Role->role == 'administrador')
			      		<a href="{{ route('edit_user',$user->id) }}">
			      			<small>| Editar</small>
			      		</a>
			      	@endif
			      	<br>
		      	@empty
		      		<strong>Aun no existen usuarios registrados</strong>
		      	@endforelse
		    </div>
	  </div>
</div>