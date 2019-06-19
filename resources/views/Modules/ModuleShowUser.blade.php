<div class="container">
	  <div class="row">
		    <div class="col-lg-8">
		      <h5><strong>Pasatiempos</strong></h5>
		    </div>
	  </div>

	  <div class="row">
		    <div class="col-lg-8">
		      	@forelse($hobbies as $hobby)
		      		<label> {{$hobby->hobby}} </label><br>
		      	@empty
		      		<strong>Aun no posee ningun Pasatiempo registrado</strong>
		      	@endforelse
		    </div>
	  </div>
</div>