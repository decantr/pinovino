<div>
	<div class="flex">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			<flux:button icon="plus" wire:click="$dispatch('add-bottle')">
				New Bottle
			</flux:button>
		</div>
	</div>

	<livewire:bottle.table perPage="5" />
</div>
