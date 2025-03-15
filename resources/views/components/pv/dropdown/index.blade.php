@props([
    'text' => null,
    'icon' => null,
])
<flux:dropdown align="end" position="bottom" :$attributes>
	<x-pv.dropdown.btn :$text :$icon />

	<flux:menu>
		{{ $slot }}
	</flux:menu>
</flux:dropdown>
