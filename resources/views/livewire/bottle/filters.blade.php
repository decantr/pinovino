<div>
	<x-pv.table.filter-btn>
		<flux:menu.item wire:click="$dispatch('reset-filters')">Clear all Filters</flux:menu.item>

		<flux:menu.separator />

		@isset($years)
			<flux:menu.submenu heading="Vintage">
				<flux:menu.checkbox.group wire:model.live="filters.vintage">
					<flux:menu.item wire:click="$dispatch('reset-filter', { key: 'vintage' })">Clear Filter</flux:menu.item>

					<flux:menu.separator />

					<flux:menu.heading>Filter by Vintage</flux:menu.heading>

					@foreach ($years as $year)
						<flux:menu.checkbox :value="$year">{{ $year }}</flux:menu.checkbox>
					@endforeach
				</flux:menu.checkbox.group>
			</flux:menu.submenu>
		@endisset

		<flux:menu.submenu heading="Type">
			<flux:menu.checkbox.group wire:model.live="filters.wine_type">
				<flux:menu.item wire:click="$dispatch('reset-filter', { key: 'wine_type' })">Clear Filter</flux:menu.item>

				<flux:menu.separator />

				<flux:menu.heading>Filter by Type</flux:menu.heading>

				@foreach (\App\Enums\WineType::cases() as $case)
					<flux:menu.checkbox :value="$case->value">{{ $case->name }}</flux:menu.checkbox>
				@endforeach
			</flux:menu.checkbox.group>
		</flux:menu.submenu>
	</x-pv.table.filter-btn>
</div>
