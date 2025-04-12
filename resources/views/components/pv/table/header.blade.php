@props(['placeholder' => 'Search...'])

<div {{ $attributes->class(['flex gap-3']) }}>
	<flux:spacer />

	<x-pv.search :$placeholder class="max-w-sm" />

	{{ $slot }}
</div>
