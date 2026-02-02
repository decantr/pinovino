<x-layouts::app :title="__('PinoVino')">
	<div class="flex h-full w-full flex-1 flex-col gap-3 rounded-xl">
		<livewire:dashboard.stats lazy />

		<div class="h-full flex-1 mt-6">
			<livewire:dashboard.wine-list />
		</div>
	</div>
</x-layouts::app>
