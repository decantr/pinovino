@props(['placeholder' => 'Search...'])

<div {{ $attributes->class(['flex gap-3']) }}>
	<flux:spacer class="max-sm:hidden" />

	<x-pv.search :$placeholder class="sm:max-w-sm" />

	{{ $slot }}
</div>
