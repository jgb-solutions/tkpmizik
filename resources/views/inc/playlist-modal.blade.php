<div class="modal fade" id="ajoute-mizik">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-black btlr btrr">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ajoute {{$music->name}} nan lis ou</h4>
			</div>
			<div class="modal-body">
				@if (count($playlists))
					@foreach($playlists as $playlist)
						<form action="{{TKPM::route('playlist.add', ['id'=>$playlist, 'music'=>$music->id])}}" method="POST" class="form-inline" role="form">
							<p>
								<button type="submit" class="btn btn-primary btn-block">
									({{$playlist->mList->count()}}) {{$playlist->name}} <i class="fa fa-plus pull-right"></i>
								</button>
							</p>
							{{ csrf_field() }}
						</form>
					@endforeach
				@else
					<p>
						Ou poko gen lis mizik. <a href="{{TKPM::route('playlists.create')}}">Kreye youn</a>
					</p>
				@endif
			</div>
			<div class="modal-footer bg-black bbrr bblr hidden">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>