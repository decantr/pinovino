@props([
	'media',
])
<?php /** @var \App\Models\Media $media */ ?>
<flux:avatar :src="$media?->preview_url"  :$attributes />
