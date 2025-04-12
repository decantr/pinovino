<div>
	<form wire:submit="save" id="rating-form">
		<div class="mb-12">
			<flux:heading>{{ $this->form->rating ? 'Edit Rating' : 'Create Rating' }}</flux:heading>
		</div>

		<flux:fieldset class="space-y-6">
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

			<div class="grid grid-cols-[1fr_8rem] gap-6 items-end mb-6">
				<flux:date-picker
					label="Date"
					max="today"
					selectable-header
					with-today
					badge="Required"
					wire:model="form.date"
				/>

				<flux:input
					min="0"
					label="Decant Duration"
					clearable
					type="number"
					wire:model="form.decant_duration"
				/>
			</div>
		</flux:fieldset>

		<flux:fieldset class="my-6">
			<flux:radio.group
				description="1 = Hated, 10 = Loved"
				label="Score"
				wire:model="form.score"
			>
				<div class="grid grid-cols-10 w-full">
					@foreach(range(1,10) as $i)
						<flux:radio :label="$i" :value="$i" />
					@endforeach
				</div>
			</flux:radio.group>
		</flux:fieldset>

		<flux:fieldset class="mt-6">
			<flux:editor
				class="[&>ui-editor-content>div]:min-h-20!"
				label="Notes"
				wire:model="form.notes"
			/>
		</flux:fieldset>
	</form>
</div>
