<div>
	<div class="flex">
		<div>
			<flux:heading size="xl">Bottle Catalogue</flux:heading>
			<flux:subheading>
				All the bottles Pinovino users have added to the system
			</flux:subheading>
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

	<livewire:bottle.table />

	<flux:modal name="modal-bottle-form" class="max-w-2xl! w-full">
		<livewire:bottle.add-update lazy />

		<x-pv.modal.footer form="bottle-form" class="mt-12"/>
	</flux:modal>
</div>
