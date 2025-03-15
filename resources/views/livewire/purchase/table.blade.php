<div>
	<div class="mt-12 flex gap-6 w-full">
		<div class="max-w-xs w-full">
			<flux:date-picker
				mode="range"
				:min="\App\Models\Purchase::oldest('date')->first('date')->date->format('Y-m-d')"
				with-presets
				selectable-header
				wire:model.live="filters.range"
			/>
		</div>

		<x-pv.table.header placeholder="Search purchase name..." class="w-full">
			<x-purchase.filters />
		</x-pv.table.header>
	</div>

	<flux:table :paginate="$rows" class="mt-6">
		<flux:table.columns>
			<flux:table.column
				sortable
				:sorted="$sortBy === 'date'"
				:direction="$sortDirection"
				wire:click="sort('date')"
			>
				Date
			</flux:table.column>

			<flux:table.column>Bottle</flux:table.column>

			<flux:table.column>User</flux:table.column>

			<flux:table.column>Cost</flux:table.column>

			<flux:table.column class="w-12"></flux:table.column>
		</flux:table.columns>

		<flux:table.rows>
			@forelse($rows as $row)
				<flux:table.row :key="$row->id">
					<flux:table.cell>
						<x-date :date="$row->date" />
					</flux:table.cell>

					<flux:table.cell>
						<x-bottle.wine-type
							:wine_type="$row->bottle->wine_type"
							class="mr-1"
							size="sm"
						/>

						{{ $row->bottle->name }}
					</flux:table.cell>

					<flux:table.cell>
						{{ $row->user->name }}
					</flux:table.cell>

					<flux:table.cell>
						{{ \Illuminate\Support\Number::currency($row->cost, 'GBP') }}
					</flux:table.cell>

					<flux:table.cell>
						@canany(['view', 'update'], $row)
							<x-pv.dropdown>
								@can('view', $row)
									<flux:menu.item icon="arrow-top-right-on-square" wire:click="open({{ $row->id }})">View</flux:menu.item>
								@endcan

								@can('update', $row)
									<flux:menu.item icon="pencil" wire:click="$dispatch('edit-purchase', { purchase: {{ $row->id }} })">Edit</flux:menu.item>
								@endcan
							</x-pv.dropdown>
						@endcanany
					</flux:table.cell>
				</flux:table.row>
			@empty
				<flux:table.row key="none">
					<flux:table.cell colspan="99">
						No results...
					</flux:table.cell>
				</flux:table.row>
			@endforelse
		</flux:table.rows>
	</flux:table>
</div>
