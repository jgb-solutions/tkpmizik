Klike la pou reyinisyalize modpas ou a:
<a href="{{ $link = route('password.reset.init', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>