<form action="{{ route('password.reset.process') }}" method="POST">

     {{ csrf_field() }}

              <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
    	<input
    		type="hidden"
    		class="form-control"
    		name="email"
    		placeholder="Antre imel ou a"
    		value="{{ $email }}"
    		required>
    </div>
    <div class="form-group">
	    <input
	    	type="password"
	    	class="form-control"
	    	name="password"
	    	placeholder="Antre nouvo modpas ou a"
	    	required>

	    	@if ($errors->has('password'))
                       <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                       </span>
                  @endif
    </div>
    <div class="form-group">
	    <input type="password"
	    name="password_confirmation"
	    class="form-control"
	    placeholder="Antre nouvo modpas ou a ankò"
	    required>

	    @if ($errors->has('password_confirmation'))
                    	<span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    	</span>
               	@endif
    </div>
    <div class="form-group">
    	<button
    		type="submit"
    		class="btn btn-primary btn-lg">
    		<i class="fa fa-key"></i>
    		Reyinisyalize
    	</button>
    </div>
</form>