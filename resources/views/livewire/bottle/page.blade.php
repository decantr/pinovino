<div>
	<div class="flex">
		<div>
			<flux:heading size="xl">Wine Catalogue</flux:heading>
			<flux:subheading>All bottles recorded</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			<flux:button icon="plus" wire:click="$dispatch('add-bottle')">
				New Bottle
			</flux:button>
		</div>
	</div>

	<div class="mt-12">
		<x-pv.table.header placeholder="Search bottle name...">
			<x-bottle.filters :$years />
		</x-pv.table.header>
	</div>

	<flux:table :paginate="$rows" class="mt-6">
		<flux:table.columns>
			<flux:table.column
				sortable
				:sorted="$sortBy === 'name'"
				:direction="$sortDirection"
				wire:click="sort('name')"
			>
				Bottle
			</flux:table.column>

			<flux:table.column>
				Grapes
			</flux:table.column>

			<flux:table.column
				class="w-12"
				sortable
				:sorted="$sortBy === 'vintage'"
				:direction="$sortDirection"
				wire:click="sort('vintage')"
			>
				Vintage
			</flux:table.column>
			<flux:table.column class="w-12"></flux:table.column>
		</flux:table.columns>

		<flux:table.rows>
			@forelse($rows as $row)
				<flux:table.row :key="$row->id">
					<flux:table.cell>
						<flux:heading>
							<x-bottle.wine-type
								:wine_type="$row->wine_type"
								size="sm"
								inset="top bottom"
								class="mr-2 min-w-12 justify-center"
							/>
							{{ $row->name }}
						</flux:heading>
						<flux:subheading>{{ $row->country }}</flux:subheading>
					</flux:table.cell>

					<flux:table.cell>
						@foreach ($row->grapes as $grape)
							{{ $grape->name }}
						@endforeach
					</flux:table.cell>

					<flux:table.cell class="text-center tabular-nums">
						{{ $row->vintage }}
					</flux:table.cell>

					<flux:table.cell>
						<x-pv.dropdown>
							<flux:menu.item icon="arrow-top-right-on-square" wire:click="open({{ $row->id }})">View</flux:menu.item>
							<flux:menu.item icon="pencil" wire:click="open({{ $row->id }})">Edit</flux:menu.item>
						</x-pv.dropdown>
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
