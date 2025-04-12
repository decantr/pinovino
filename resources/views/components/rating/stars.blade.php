@props([
	'score',
])

<div class="flex gap-1 items-stretch">
	<flux:icon name="star" variant="mini" class="text-amber-500"/>

	<div class="mt-0.5">{{ $score }}</div>
</div>
