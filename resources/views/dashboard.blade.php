<x-layouts.app :title="__('Dashboard')">
	<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
		<div class="grid auto-rows-min gap-4 md:grid-cols-3">
			<div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
				<div class="p-6">
					<flux:subheading size="lg">Total Wines</flux:subheading>
					<flux:heading size="xl">09111123</flux:heading>
				</div>
			</div>
			<div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
				<div class="p-6">
					<flux:subheading size="lg">Total Users</flux:subheading>
					<flux:heading size="xl">123</flux:heading>
				</div>
			</div>
			<div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
				<div class="p-6">
					<flux:subheading size="lg">Total Reviews</flux:subheading>
					<flux:heading size="xl">19123</flux:heading>
				</div>
			</div>
		</div>

		<div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
			<x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
		</div>
	</div>
</x-layouts.app>