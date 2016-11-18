<div
	class="row audio-image btrr"
	style="background-image:url('{{ TKPM::asset($music->image, 'thumbs') }}')">

	<div class="col-sm-12 audio-content">
		<div class="ui360 ui360-vis">
			<a href="{{ TKPM::route('music.play', $music->id) }}" type="audio/mpeg"></a>
		</div>
	</div>
</div>