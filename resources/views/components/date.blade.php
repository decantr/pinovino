@props(['date'])
<date datetime="{{ $date->toISOString() }}">{{ $date?->format('M jS, Y') }}</date>
