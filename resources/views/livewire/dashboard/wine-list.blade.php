<div>
	<div class="flex">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			<flux:dropdown align="end" position="bottom">
				<flux:button icon="plus">
					New Purchase
				</flux:button>

				<flux:menu>
					<flux:menu.item icon="" wire:click="$dispatch('create-purchase')">
						Existing Bottle
					</flux:menu.item>

					@can('create', \App\Models\Bottle::class)
						<flux:menu.item icon="" wire:click="$dispatch('create-bottle')">
							New Bottle
						</flux:menu.item>
					@endcan
				</flux:menu>
			</flux:dropdown>
		</div>
	</div>

	<livewire:bottle.table perPage="5" :apply="['applyOwner']" />

	<flux:modal name="modal-bottle-form" class="max-w-2xl! w-full">
		<livewire:bottle.add-update lazy />

		<x-pv.modal.footer form="bottle-form" class="mt-12"/>
	</flux:modal>

	<flux:modal name="modal-purchase-form" class="max-w-2xl! w-full">
		<livewire:purchase.add-update lazy />

		<x-pv.modal.footer form="purchase-form" class="mt-12"/>
	</flux:modal>
</div>
