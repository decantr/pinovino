<div>
	<div class="flex">
		<div>
			<flux:heading size="xl">Wine Catalogue</flux:heading>
			<flux:subheading>All bottles recorded</flux:subheading>
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

	<livewire:bottle.table />
</div>
