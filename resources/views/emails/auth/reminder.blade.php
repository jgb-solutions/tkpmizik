@include('emails.user.header')
	<h2>Reyinisyalizasyon modpas</h2>

	<div>
		Pou Reyinisyalize modpas ou a klike sou lyen sa a:
		{{ URL::to('password/reset', array($token)) }}.<br/>
		Lyen sa a ap ekpire nan {{ Config::get('auth.reminder.expire', 120) }} minit.
	</div>
@include('emails.user.footer')
