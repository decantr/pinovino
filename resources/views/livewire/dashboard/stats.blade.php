<div class="grid auto-rows-min gap-3 grid-cols-3">
	<flux:card>
		<flux:subheading size="sm">
			<span class="max-md:hidden">Total</span>
			Bottles
		</flux:subheading>
		<flux:heading size="lg">{{ $bottles }}</flux:heading>
	</flux:card>

	<flux:card>
		<flux:subheading size="sm">
			<span class="max-md:hidden">Total</span>
			Purchases
		</flux:subheading>
		<flux:heading size="lg">{{ $purchases }}</flux:heading>
	</flux:card>

	<flux:card>
		<flux:subheading size="sm">
			<span class="max-md:hidden">Total</span>
			Ratings
		</flux:subheading>
		<flux:heading size="lg">{{ $ratings }}</flux:heading>
	</flux:card>
</div>
