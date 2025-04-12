@props([
	'bottle',
])
<div class="">
	<flux:text class="inline! tabular-nums">{{ $bottle->vintage }}</flux:text>
	<flux:heading class="inline!">{{ $bottle->name }}</flux:heading>
</div>
