<div class="form-group">
	<label for="free-paid" class="control-label col-sm-4">Gratis oubyen Peye</label>
	<div class="col-sm-8">
		<div class="btn-group btn-group-lg" data-toggle="buttons">
		 	<label class="btn btn-primary {{ isset($mp3) && $mp3->price == 'free' ? 'active' : '' }} {{ ! isset($mp3) ? 'active' : '' }}">
		    	<input
		    		type="radio"
		    		name="price"
		    		{{ isset($mp3) && $mp3->price == 'free' ? 'checked' : '' }}
		    		value="free">
		    	<b>
		    		<i class="fa fa-star"></i>
		    		Gratis
		    	</b>
		  	</label>
		  	<label class="btn btn-success {{ isset($mp3) && $mp3->price == 'paid' ? 'active' : '' }}">
		    	<input
		    		type="radio"
		    		name="price"
		    		{{ isset($mp3) && $mp3->price == 'paid' ? 'checked' : '' }}
		    		value="paid">
		    	<b>
		    		Peye
		    		<i class="fa fa-dollar"></i>
		    	</b>
		  	</label>
		</div>
	</div>
</div>