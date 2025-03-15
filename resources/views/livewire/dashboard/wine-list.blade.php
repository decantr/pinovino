<div>
	<div class="flex">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			<flux:button icon="plus" wire:click="addNew">
				New Bottle
			</flux:button>
		</div>
	</div>

	<flux:table :paginate="$rows" class="mt-6">
		<flux:table.columns>
			<flux:table.column>Bottle</flux:table.column>
			<flux:table.column>Vintage</flux:table.column>
			<flux:table.column></flux:table.column>
		</flux:table.columns>

		<flux:table.rows>
			@foreach($rows as $row)
			<flux:table.row :key="$row->id">
				<flux:table.cell>
					<flux:heading>{{ $row->name }}</flux:heading>
					<flux:subheading>{{ $row->country }}</flux:subheading>
				</flux:table.cell>
				<flux:table.cell>{{ $row->vintage }}</flux:table.cell>
				<flux:table.cell></flux:table.cell>
			</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>
</div>