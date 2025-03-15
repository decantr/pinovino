<div>
	<div class="flex">
		<div>
			<flux:heading size="xl">Recent Purchases</flux:heading>
			<flux:subheading>All purchases</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			@can('create', \App\Models\Purchase::class)
				<flux:button icon="plus" wire:click="$dispatch('create-purchase')">
					New Purchase
				</flux:button>
			@endcan
		</div>
	</div>

	<livewire:purchase.table />

	<flux:modal name="modal-purchase-form" class="max-w-2xl! w-full">
		<livewire:purchase.add-update lazy />

		<x-pv.modal.footer form="purchase-form" class="mt-12"/>
	</flux:modal>

	<flux:modal name="modal-bottle-form" class="max-w-2xl! w-full">
		<livewire:bottle.add-update lazy />

		<x-pv.modal.footer form="bottle-form" class="mt-12"/>
	</flux:modal>
</div>
