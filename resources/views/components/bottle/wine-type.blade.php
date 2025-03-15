@props(['wine_type'])
<flux:badge :color="$wine_type->colour()" :$attributes>{{ $wine_type->name }}</flux:badge>
