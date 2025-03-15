<div>
	<form wire:submit="save" id="purchase-form">
		<div class="mb-12">
			<flux:heading>{{ $this->form->purchase ? 'Edit Purchase' : 'Create Purchase' }}</flux:heading>
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

			<div class="grid grid-cols-[1fr_8rem] gap-6 items-center mb-6">
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

				<flux:button wire:click="$dispatch('create-bottle')" class="mt-6">
					Add New
				</flux:button>
			</div>

			<flux:date-picker
				label="Date"
				max="today"
				selectable-header
				with-today
				badge="Required"
				wire:model="form.date"
			/>

			<div class="grid grid-cols-[1fr_3fr] gap-6 w-full my-6">
				<flux:input.group label="Cost" badge="Required">
					<flux:input.group.prefix>£</flux:input.group.prefix>

					<flux:input wire:model="form.cost" />
				</flux:input.group>

				<flux:input
					label="Store"
					wire:model="form.store"
				/>
			</div>

			<flux:editor
				label="Notes"
				wire:model="form.notes"
			/>
		</flux:fieldset>
	</form>
</div>
