Klike la pou reyinisyalize modpas ou a:
<a href="{{ $link = TKPM::route('password.reset.init', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>