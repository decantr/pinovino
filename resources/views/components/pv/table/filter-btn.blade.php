<flux:dropdown align="end" position="bottom">
	<flux:button icon="funnel" class="max-sm:w-10">
		<span class="max-sm:hidden">Filters</span>
	</flux:button>

	<flux:menu>
		{{ $slot }}
	</flux:menu>
</flux:dropdown>
