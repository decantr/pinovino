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

			<flux:table.column class="w-12">
				Type
			</flux:table.column>

			<flux:table.column>
				Rating
			</flux:table.column>

			<flux:table.column>
				Grapes
			</flux:table.column>

			<flux:table.column class="w-12"></flux:table.column>
		</flux:table.columns>

		<flux:table.rows>
			@forelse($rows as $row)
				<flux:table.row :key="$row->id">
					<flux:table.cell class="pr-0! w-10">
						<x-bottle.avatar :bottle="$row" size="lg" />
					</flux:table.cell>

					<flux:table.cell>
						<x-bottle.name :bottle="$row"/>
						<flux:subheading>{{ $row->country }}</flux:subheading>
					</flux:table.cell>

					<flux:table.cell>
						<x-bottle.wine-type
							:wine_type="$row->wine_type"
							size="sm"
							inset="top bottom"
							class="mr-2 min-w-12 justify-center"
						/>
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

								<flux:menu.item
									icon="star"
									wire:click="$dispatch('create-rating', { bottle: {{ $row->id }} })"
								>
									Add Rating
								</flux:menu.item>


								@can('update', $row)
									<flux:menu.separator />

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
