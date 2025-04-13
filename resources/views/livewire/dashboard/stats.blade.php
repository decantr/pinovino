<div class="grid auto-rows-min gap-3 grid-cols-3">
	<flux:card>
		<flux:subheading size="lg">
			<span class="max-md:hidden">Total</span>
			Bottles
		</flux:subheading>
		<flux:heading size="xl">{{ $bottles }}</flux:heading>
	</flux:card>

	<flux:card>
		<flux:subheading size="lg">
			<span class="max-md:hidden">Total</span>
			Purchases
		</flux:subheading>
		<flux:heading size="xl">{{ $purchases }}</flux:heading>
	</flux:card>

	<flux:card>
		<flux:subheading size="lg">
			<span class="max-md:hidden">Total</span>
			Ratings
		</flux:subheading>
		<flux:heading size="xl">{{ $ratings }}</flux:heading>
	</flux:card>
</div>
