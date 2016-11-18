<?php
$urle = urlencode($url);
$via = config('site.twitter');
$name = $obj->name;
?>

<i class="fa fa-share"></i> Pataje sou:<br>
<a
	class="btn btn-primary"
	target="_blank"
	href="https://www.facebook.com/sharer.php?u={{ $urle }}&amp;t={{ $name }}">
	<strong>
	  <i class="fa fa-facebook fa-2x fb"></i> <span class="hidden-xs"></span>
	</strong>
</a>

<a
	class="btn btn-info"
	target="_blank"
	href="https://twitter.com/share?url={{ $urle }}&amp;text={{ $name }}&amp;via={{ $via }}">
	<strong>
	  <i class="fa fa-twitter fa-2x tw"></i> <span class="hidden-xs"></span>
	</strong>
</a>

<a
	class="btn btn-success"
	target="_blank"
	href="whatsapp://send?text={{ $name }} {{ $urle }} via {{ '@' . $via }}">
	<strong>
	  <i class="fa fa-whatsapp fa-2x wa"></i> <span class="hidden-xs"></span>
	</strong>
</a>

<a
	class="btn btn-danger"
	target="_blank"
	href="https://plus.google.com/share?url={{ $urle }}">
	<strong>
	  <i class="fa fa-google-plus fa-2x google"></i> <span class="hidden-xs"></span>
	</strong>
</a>