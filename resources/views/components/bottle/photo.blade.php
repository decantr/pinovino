@props([
	'media',
])
<?php /** @var \App\Models\Media $media */ ?>
<?php
	// ensure avatars dont get warped
	$attributes = $attributes->class([
			match ($attributes->get('size')) {
				'xs' => '[&>img]:size-6',
				'sm' => '[&>img]:size-8',
				'lg' => '[&>img]:size-12',
				'xl' => '[&>img]:size-16',
				default => ' [&>img]:size-10',
			},
			'[&>img]:object-cover [&>img]:object-center',
	]);
?>
<flux:avatar
	:src="$media?->preview_url"
	:$attributes
/>
