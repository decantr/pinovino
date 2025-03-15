@props(['placeholder' => 'Search...'])

<div class="flex gap-3">
	<flux:spacer />

	<x-pv.search :$placeholder class="max-w-sm" />

	<flux:dropdown align="end" position="bottom">
		<flux:button icon="funnel">
			Filters
		</flux:button>

		<flux:menu>
			{{ $slot }}
		</flux:menu>
	</flux:dropdown>
</div>
