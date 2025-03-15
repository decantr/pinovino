<div>
	<div class="flex">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			@can('create', \App\Models\Bottle::class)
				<flux:button icon="plus" wire:click="$dispatch('add-bottle')">
					New Bottle
				</flux:button>
			@endcan
		</div>
	</div>

	<livewire:bottle.table perPage="5" />
</div>
