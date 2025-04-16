<div>
	<div>
		<flux:card>
			<div class="flex items-center gap-6">
				<div class="">
					<x-bottle.avatar size="xl" :$bottle />
				</div>
				<div class="">
					<flux:heading class="inline!" size="xl">
						{{ $bottle->name }}

						<flux:text class="inline! tabular-nums">{{ $bottle->vintage }}</flux:text>
					</flux:heading>

					<flux:subheading class="flex gap-2 flex-wrap">
						<flux:text>
							{{ $bottle->country }}
						</flux:text>


						@if($bottle->region)
							&middot;

							<flux:text>
								{{ $bottle->region }}
							</flux:text>
						@endif

						@if($bottle->producer)
							&middot;

							<flux:text variant="strong">
								{{ $bottle->producer }}
							</flux:text>
						@endif

					</flux:subheading>

					<flux:subheading class="flex gap-2 flex-wrap">
						@if($bottle->size)
							<div class="flex">
								<flux:text variant="strong">
									{{ $bottle->size }}
								</flux:text>
								<flux:text>cl</flux:text>
							</div>
						@endif
					</flux:subheading>
				</div>

				<flux:spacer />

				<div class="flex items-center gap-3">
					@can('create', \App\Models\Purchase::class)
					<flux:button
						icon="banknotes"
						wire:click="$dispatch('create-purchase', { bottle: {{ $bottle->id }} })"
					>
						Add Purchase
					</flux:button>
					@endcan

					<flux:button
						:href="route('bottle.index')"
						icon="x-mark"
					/>
				</div>
			</div>


			<flux:text class="my-12">
				{!! $bottle->description !!}
			</flux:text>

			<div>
				<flux:heading class="mb-3">Images</flux:heading>

				<div class="flex gap-3 flex-wrap">
					@foreach($bottle->media as $media)
						<x-bottle.photo :$media />
					@endforeach
				</div>
			</div>
		</flux:card>

		<flux:card class="mt-12">
			<flux:heading size="lg">
				Your Purchases of this Bottle
			</flux:heading>

			<livewire:purchase.table :bottle_id="$bottle->id" lazy />
		</flux:card>

	</div>

	<flux:modal name="modal-purchase-form" class="max-w-2xl! w-full">
		<livewire:purchase.add-update :$bottle lazy />

		<x-pv.modal.footer form="purchase-form" class="mt-12"/>
	</flux:modal>
</div>
