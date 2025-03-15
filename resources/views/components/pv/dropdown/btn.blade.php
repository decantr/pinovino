@props([
'text' => null,
'icon' => 'ellipsis-horizontal',
])
<flux:button :$attributes :$icon inset="top bottom" size="sm" variant="ghost">{{ $text }}</flux:button>