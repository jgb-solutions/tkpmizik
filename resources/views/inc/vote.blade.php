<?php

function vote( $obj )
{
	$btn1 = 'default';
	$disabled1 = '';
	$btn2 = 'default';
	$disabled2 = '';
	$obj_id = '$' . strtolower( $obj )->id;

	if ( Auth::check() )
	{
		$user_id = Auth::user()->id;

		$vote = Vote::where('user_id', $user_id)
					->where('obj_id', $obj_id)
					->where('obj', $obj)
					->first();
		if ( $vote )
		{
			if ( $vote->vote == 1 )
			{
				$btn1 = 'success';
				$disabled2 = 'disabled="disabled"';
			} elseif( $vote->vote == -1 )
			{
				$btn2 = 'danger';
				$disabled1 = 'disabled="disabled"';
			}
		}
	} ?>

	<div class="btn-group" id="vote-btn">
		<button
			class="btn btn-{{ $btn1 }}"
			id="voteUp" {{ $disabled1 }}>
			<i class="fa fa-thumbs-o-up"></i>
		</button>
		<button
			class="btn btn-{{ $btn2 }}"
			id="voteDown" {{ $disabled2 }}>
			<i class="fa fa-thumbs-o-down"></i>
		</button>
	</div>

<?php } ?>