@props([
	'bottle',
])
<?php /** @var \App\Models\Bottle $bottle */ ?>
<div>
	<x-bottle.photo :media="$bottle->avatar" />
</div>
