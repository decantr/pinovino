<div>
	<form wire:submit="save" id="bottle-form">
		<div class="mb-6">
			<flux:heading size="lg">
				{{ $this->form->bottle ? 'Edit Bottle' : 'Create Bottle' }}
			</flux:heading>
		</div>

		<flux:fieldset>
			<flux:radio.group wire:model="form.wine_type" label="Wine Type" variant="segmented">
				@foreach(\App\Enums\WineType::cases() as $case)
					<flux:radio :value="$case->value" :label="$case->name" />
				@endforeach
			</flux:radio.group>

			<div class="flex max-md:flex-wrap gap-6 mt-6 mb-3 items-end">
				<div class="max-md:w-full min-w-64 flex-grow-1">
					<flux:input
						badge="Required"
						label="Name"
						required
						wire:model="form.name"
					/>
				</div>

				<div class="flex-1 min-w-28">
					<flux:input
						badge="Required"
						label="Vintage"
						required
						type="number"
						min="1900"
						max="2050"
						wire:model="form.vintage"
					/>
				</div>

				<div class="flex-1 min-w-28">
					<flux:select
						label="Size"
						wire:model="form.size"
					>
						@foreach(\App\Enums\BottleSize::cases() as $case)
							<flux:select.option :value="$case->value">
								{{ $case->value }}cl
							</flux:select.option>
						@endforeach
					</flux:select>
				</div>
			</div>
		</flux:fieldset>

		<flux:separator class="mx-auto max-w-sm my-6"/>

		<flux:fieldset>
			<div class="grid grid-cols-2 gap-6">
				<flux:input
					label="Country"
					wire:model="form.country"
				/>

				<flux:input
					label="Region"
					wire:model="form.region"
				/>

				<flux:input
					label="Producer"
					wire:model="form.producer"
				/>
			</div>
		</flux:fieldset>

		<flux:fieldset class="mt-6">
			<flux:input
				description="Add photographs of this bottle to help identify it"
				type="file"
				label="Photographs"
				wire:model="form.files"
				multiple
			/>

			<div class="flex gap-3 flex-wrap">
				@foreach($form->bottle?->media ?? [] as $media)
					<x-bottle.photo :$media :wire:key="$media->id" size="lg"/>
				@endforeach
			</div>
		</flux:fieldset>

		<div class="mt-6">
			<flux:editor
				class="[&>ui-editor-content>div]:min-h-20!"
				label="Description"
				wire:model="form.description"
			/>
		</div>
	</form>
</div>
