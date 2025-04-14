@props([
	'bottle',
	'type' => false,
])
<x-bottle.name :$bottle />
<div class="flex items-baseline gap-2">
	<x-bottle.wine-type
		:wine_type="$bottle->wine_type"
		size="sm"
		inset="top bottom"
		:class="'h-5 ' . ($type ? '' : 'sm:hidden')"
	/>

	<flux:subheading>
		{{ $bottle->country }}

		&middot;

		<x-bottle.size :size="$bottle->size" />
	</flux:subheading>
</div>
