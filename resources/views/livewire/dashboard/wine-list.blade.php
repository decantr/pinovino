<div>
	<div class="flex gap-y-3 mb-5">
		<div>
			<flux:heading>Wine Cellar</flux:heading>
			<flux:subheading>Wines currently in your collection</flux:subheading>
		</div>

		<flux:spacer />

		<div class="flex gap-3 justify-end">
			<flux:button
				icon="plus"
				wire:click="$dispatch('create-purchase')"
				class="max-md:hidden"
			>
				New Purchase
			</flux:button>

			<flux:dropdown align="end" position="bottom">
				<flux:button icon="ellipsis-horizontal" />
				<flux:menu>
					@can('create', \App\Models\Rating::class)
					<flux:menu.item icon="star" wire:click="$dispatch('create-rating')">
						New Rating
					</flux:menu.item>
					@endcan

					@can('create', \App\Models\Purchase::class)
						<flux:menu.separator/>

						<flux:menu.item icon="banknotes" wire:click="$dispatch('create-purchase')">
							New Purchase
						</flux:menu.item>
					@endcan

					@can('create', \App\Models\Bottle::class)
						<flux:menu.separator/>
						<flux:menu.item icon="plus" wire:click="$dispatch('create-bottle')">
							New Bottle
						</flux:menu.item>
					@endcan
				</flux:menu>
			</flux:dropdown>
		</div>
	</div>

	<livewire:dashboard.current-table perPage="5" />

	<flux:modal name="modal-bottle-form" class="max-w-2xl! w-full">
		<livewire:bottle.add-update lazy />

		<x-pv.modal.footer form="bottle-form" class="mt-12"/>
	</flux:modal>

	<flux:modal name="modal-purchase-form" class="max-w-2xl! w-full">
		<livewire:purchase.add-update lazy />

		<x-pv.modal.footer form="purchase-form" class="mt-12"/>
	</flux:modal>

	<flux:modal name="modal-rating-form" class="max-w-2xl! w-full">
		<livewire:rating.add-update lazy />

		<x-pv.modal.footer form="rating-form" class="mt-12"/>
	</flux:modal>
</div>
