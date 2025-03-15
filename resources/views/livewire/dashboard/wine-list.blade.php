<div>
	<div class="flex">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			@can('create', \App\Models\Bottle::class)
				<flux:button icon="plus" wire:click="$dispatch('create-bottle')">
					New Bottle
				</flux:button>
			@endcan
		</div>
	</div>

	<livewire:bottle.table perPage="5" />

	<flux:modal name="modal-bottle-form" class="max-w-2xl! w-full">
		<livewire:bottle.add-update lazy />

		<x-pv.modal.footer form="bottle-form" class="mt-12"/>
	</flux:modal>
</div>
