<div>
	<div class="flex">
		<div>
			<flux:heading size="xl">All Ratings</flux:heading>
			<flux:subheading>All ratings in the system</flux:subheading>
		</div>

		<flux:spacer />

		<div>
			@can('create', \App\Models\Rating::class)
				<flux:button icon="plus" wire:click="$dispatch('create-rating')">
					New Rating
				</flux:button>
			@endcan
		</div>
	</div>

	<livewire:rating.table />

	<flux:modal name="modal-rating-form" class="max-w-2xl! w-full">
		<livewire:rating.add-update lazy />

		<x-pv.modal.footer form="rating-form" class="mt-12"/>
	</flux:modal>
</div>
