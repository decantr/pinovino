<div>
	<div class="mt-12">
		<x-pv.table.header placeholder="Search bottle name...">
			<livewire:bottle.filters wire:model.live="filters" lazy />
		</x-pv.table.header>
	</div>

	<flux:table :paginate="$rows" class="mt-6">
		<flux:table.columns>
			<flux:table.column class="pr-0! w-0" />

			<flux:table.column
				sortable
				:sorted="$sortBy === 'name'"
				:direction="$sortDirection"
				wire:click="sort('name')"
			>
				Bottle
			</flux:table.column>

			<flux:table.column>

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
					<flux:table.cell class="pr-0! w-10">
						<x-bottle.avatar :bottle="$row" />
					</flux:table.cell>

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
						<flux:subheading>
							{{ $row->country }}
							<x-bottle.size :size="$row->size" />
						</flux:subheading>
					</flux:table.cell>

					<flux:table.cell>
						@empty($row->rating)
							Not Rated
						@else
							{{ $row->rating?->score }}
						@endempty
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
						@canany(['view', 'update'], $row)
							<x-pv.dropdown>
								@can('view', $row)
									<flux:menu.item
										icon="arrow-top-right-on-square"
										:href="route('bottle.show', $row->id)"
									>
										View
									</flux:menu.item>
								@endcan
								@can('update', $row)
									<flux:menu.item
										icon="pencil"
										wire:click="$dispatch('edit-bottle', { bottle: {{ $row->id }} })"
									>
										Edit
									</flux:menu.item>
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
