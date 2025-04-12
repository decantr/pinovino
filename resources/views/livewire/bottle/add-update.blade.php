<div>
	<form wire:submit="save" id="bottle-form">
		<div class="mb-12">
			<flux:heading>{{ $this->form->bottle ? 'Edit Bottle' : 'Create Bottle' }}</flux:heading>
		</div>

		<flux:fieldset>
			<flux:radio.group wire:model="form.wine_type" label="Wine Type" variant="segmented">
				@foreach(\App\Enums\WineType::cases() as $case)
					<flux:radio :value="$case->value" :label="$case->name" />
				@endforeach
			</flux:radio.group>

			<div class="grid grid-cols-[3fr_1fr] gap-6 mt-6">
				<flux:input
					badge="Required"
					label="Name"
					required
					wire:model="form.name"
				/>

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
