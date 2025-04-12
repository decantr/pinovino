<div>
	<x-pv.table.filter-btn>
		<flux:menu.item wire:click="$dispatch('reset-filters')">Clear all Filters</flux:menu.item>

		<flux:menu.separator />

		<flux:menu.submenu heading="Vintage" />
		<flux:menu.submenu heading="Type" />
	</x-pv.table.filter-btn>
</div>
