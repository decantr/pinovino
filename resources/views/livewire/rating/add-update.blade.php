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
					wire:model.live="form.bottle_id"
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

			<div>
				<flux:select
					label="Purchase"
					badge="Required"
					variant="listbox"
					class="[&>button>ui-selected>div]:w-full!"
					wire:model="form.purchase_id"
				>
					@forelse($this->purchases() as $p)
						<flux:select.option :value="$p->id">
							<div class="flex gap-3 w-full">
								<flux:subheading class="tabular-nums">
									{{ $p->store }}
								</flux:subheading>
								<flux:heading class="my-0! ml-3 mr-auto">
									{{ \Illuminate\Support\Number::currency($p->cost) }}
								</flux:heading>
								<flux:subheading class="tabular-nums">
									<x-date :date="$p->date" />
								</flux:subheading>
							</div>
						</flux:select.option>
					@empty
						<flux:select.option disabled>You haven't bought this bottle</flux:select.option>
					@endforelse
				</flux:select>

			</div>

			<div class="grid grid-cols-[1fr_8rem] gap-6 items-end">
				<flux:date-picker
					label="Date"
					max="today"
					selectable-header
					with-today
					badge="Required"
					wire:model="form.date"
				/>

				@if(empty($form->bottle_id) || $this->bottle?->wine_type === \App\Enums\WineType::Red)
					<flux:input
						min="0"
						label="Decant Duration"
						clearable
						type="number"
						wire:model="form.decant_duration"
					/>
				@endif
			</div>
		</flux:fieldset>

		<flux:fieldset class="my-6">
			<flux:radio.group
				badge="Required"
				description="1 = Hated, 10 = Loved"
				label="Score"
				required
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
