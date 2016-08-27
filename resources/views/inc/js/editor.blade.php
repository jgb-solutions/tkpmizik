@section('scripts')
	<script src="{{ TKPM::asset('js/nicEdit.js') }}"></script>
	<script>
		new nicEditor({
			fullPanel : true,
			iconsPath : '/images/nicEditorIcons.gif'
		})
		.panelInstance('content');
	</script>

@stop