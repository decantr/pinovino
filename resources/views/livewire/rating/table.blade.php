<div>
	<div class="mt-12">
		<x-pv.table.header placeholder="Search bottle name...">
		</x-pv.table.header>
	</div>

	<flux:table :paginate="$rows" class="mt-6">
		<flux:table.columns>
			<flux:table.column class="pr-0! w-0" />

			<flux:table.column
				sortable
				:sorted="$sortBy === 'bottles.name'"
				:direction="$sortDirection"
				wire:click="sort('bottles.name')"
			>
				Bottle
			</flux:table.column>

			<flux:table.column class="w-12">
				Type
			</flux:table.column>

			<flux:table.column
				sortable
				:sorted="$sortBy === 'rating'"
				:direction="$sortDirection"
				wire:click="sort('rating')"
			>
				Rating
			</flux:table.column>

			<flux:table.column
				sortable
				:sorted="$sortBy === 'user'"
				:direction="$sortDirection"
				wire:click="sort('user')"
			>
				User
			</flux:table.column>

			<flux:table.column class="w-12"></flux:table.column>
		</flux:table.columns>

		<flux:table.rows>
			@forelse($rows as $row)
				<flux:table.row :key="$row->id">
					<flux:table.cell class="pr-0! w-10">
						<x-bottle.avatar :bottle="$row->bottle" />
					</flux:table.cell>

					<flux:table.cell>
						<x-bottle.name :bottle="$row->bottle" />
						<flux:subheading>{{ $row->bottle->country }}</flux:subheading>
					</flux:table.cell>

					<flux:table.cell>
						<x-bottle.wine-type
							:wine_type="$row->bottle->wine_type"
							size="sm"
							inset="top bottom"
							class="mr-2 min-w-12 justify-center"
						/>
					</flux:table.cell>

					<flux:table.cell>
						<x-rating.stars :score="$row->score" />
					</flux:table.cell>

					<flux:table.cell>
						{{ $row->user->name }}
					</flux:table.cell>

					<flux:table.cell>
						@canany(['view', 'update'], $row)
							<x-pv.dropdown>
								@can('view', $row)
									<flux:menu.item icon="arrow-top-right-on-square" wire:click="open({{ $row->id }})">View</flux:menu.item>
								@endcan
								@can('update', $row)
									<flux:menu.item icon="pencil" wire:click="$dispatch('edit-bottle', { bottle: {{ $row->id }} })">Edit</flux:menu.item>
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
