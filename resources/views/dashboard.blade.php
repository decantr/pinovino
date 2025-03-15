<x-layouts.app :title="__('Dashboard')">
	<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
		<div class="grid auto-rows-min gap-4 md:grid-cols-3">
			<flux:card>
				<flux:subheading size="lg">Total Bottles</flux:subheading>
				<flux:heading size="xl">{{ \App\Models\Bottle::count() }}</flux:heading>
			</flux:card>

			<flux:card>
				<flux:subheading size="lg">Total Purchases</flux:subheading>
				<flux:heading size="xl">{{ \App\Models\Purchase::count() }}</flux:heading>
			</flux:card>

			<flux:card>
				<flux:subheading size="lg">Total Ratings</flux:subheading>
				<flux:heading size="xl">{{ \App\Models\Rating::count() }}</flux:heading>
			</flux:card>
		</div>

		<flux:card class="h-full flex-1">
			<livewire:dashboard.wine-list />
		</flux:card>
	</div>
</x-layouts.app>