@if ($role == 'nav')
	@foreach($cats as $cat)
	<li>
		<a
			href="{{ route('cat.show', ['slug' => $cat->slug]) }}">
			<i class="fa fa-chevron-right"></i>
			{{ $cat->name }}

			<span class="badge">
				{{ $cat->count }}
			</span>
		</a>
	</li>
	@endforeach
@elseif($role == 'module')
	@foreach($cats as $cat)
		<strong>
			<a class="list-group-item" href="{{ route('cat.show', ['slug' => $cat->slug]) }}">
				<i class="fa fa-chevron-right"></i>
				{{ $cat->name }}
				<span class="badge pull-right">
					{{ $cat->count }}
				</span>
			</a>
		</strong>

	@endforeach
@else
	@foreach($cats as $cat)
		<a href="{{ route('cat.show', ['slug' => $cat->slug]) }}">
			{{ $cat->name }}
			<span class="badge pull-right">
				{{ $cat->count }}
			</span>
		</a><br>
	@endforeach
@endif