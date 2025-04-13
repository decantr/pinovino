<x-layouts.app :title="__('Dashboard')">
	<div class="flex h-full w-full flex-1 flex-col gap-3 rounded-xl">
		<livewire:dashboard.stats lazy />

		<flux:card class="h-full flex-1">
			<livewire:dashboard.wine-list />
		</flux:card>
	</div>
</x-layouts.app>
