<div>
	<form wire:submit="save" id="purchase-form">
		<div class="mb-6">
			<flux:heading size="lg">{{ $this->form->purchase ? 'Edit Purchase' : 'Create Purchase' }}</flux:heading>
		</div>

		<flux:fieldset>
			@if(\auth()->user()->is_admin)
				<flux:select
					label="User"
					badge="Required"
					variant="listbox"
					searchable
					wire:model="form.user_id"
				>
					@foreach($this->users as $user)
						<flux:select.option :value="$user->id">{{ $user->name }}</flux:select.option>
					@endforeach
				</flux:select>
			@endif

			@empty($bottle)
			<div class="flex gap-3 items-end mb-6">
				<div class="flex-1">
					<flux:select
						label="Bottle"
						badge="Required"
						variant="listbox"
						searchable
						wire:model="form.bottle_id"
						class="[&>button>ui-selected>div]:w-full!"
					>
						@foreach($this->bottles as $bottle)
							<flux:select.option :value="$bottle->id">
								<div class="flex gap-3 w-full">
									<flux:subheading class="tabular-nums">{{ $bottle->vintage }}</flux:subheading>
									<flux:heading class="mt-0! ml-3 mr-auto">{{ $bottle->name }}</flux:heading>
									<x-bottle.wine-type :wine_type="$bottle->wine_type" size="sm" inset="top bottom" />
								</div>
							</flux:select.option>
						@endforeach
					</flux:select>
				</div>

				<flux:button
					class="md:hidden"
					icon="plus"
					wire:click="$dispatch('create-bottle')"
				/>

				<flux:button
					class="w-28 max-md:hidden"
					icon="plus"
					wire:click="$dispatch('create-bottle')"
				>
					Add New
				</flux:button>
			</div>
			@endempty

			<flux:separator class="mx-auto max-w-sm my-6"/>

			<div>
				<flux:date-picker
					label="Date"
					max="today"
					selectable-header
					with-today
					badge="Required"
					wire:model="form.date"
				/>
			</div>


			<div class="flex gap-6 w-full my-6 items-end">
				<div class="max-w-40">
					<flux:input.group label="Cost" badge="Required">
						<flux:input.group.prefix>£</flux:input.group.prefix>

						<flux:input wire:model="form.cost" />
					</flux:input.group>
				</div>

				<div class="flex-1">
					<flux:input
						label="Store"
						wire:model="form.store"
					/>
				</div>
			</div>

			<flux:editor
				class="[&>ui-editor-content>div]:min-h-20! max-sm:max-w-[85svw]"
				label="Notes"
				wire:model="form.notes"
			/>
		</flux:fieldset>
	</form>
</div>
