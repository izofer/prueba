@if(session('status'))
	<div class="card-body">
        <span class="alert alert-success" role="alert">
            <strong>{{ session('status') }}</strong>
        </span>
	</div>
@endif
@if($errors->all())
	<div class="card-body">
        <span class="alert alert-danger" role="alert">
           	@foreach($errors->all() as $error)
           		{{$error}}
           	@endforeach
        </span>
	</div>
@endif


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
		        <button type="submit" class="btn btn-primary">Guardar Pasatiempos</button>
		    </div>
		</div>
	</form>
</div>