@props([
    'form' => null,
    'href' => null,
    'save_text' => 'Save',
])

<div {{ $attributes->class(['flex gap-2']) }}>
	<flux:spacer />

	@isset($href)
		<flux:button :$href variant="ghost">Cancel</flux:button>
	@else
		<flux:modal.close>
			<flux:button variant="ghost">Cancel</flux:button>
		</flux:modal.close>
		@endif

		<flux:button
			type="submit"
			variant="primary"
			class="px-9"
			:$form
		>
			{{ $save_text }}
		</flux:button>
	</div>
