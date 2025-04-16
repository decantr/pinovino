<div>
	<section class="w-full">
		<div class="relative mb-6 w-full">
			<flux:heading size="xl" level="1">Invite a new Pinovite</flux:heading>
			<flux:subheading size="lg" class="mb-6">Invite a friend to pinovino</flux:subheading>
			<flux:separator variant="subtle" />
		</div>

		<div class="space-y-12">

			<div>
				<flux:heading size="lg">Referral Code</flux:heading>

				<flux:text>
					Give someone the code below to invite them to pinovino.
				</flux:text>

				<div class="mt-6 max-w-md">
					<flux:input.group label="Your Referral Code">
						<flux:input :$value copyable readonly />

						<flux:button icon="arrow-path" wire:click="newCode">
							New Code
						</flux:button>
					</flux:input.group>
				</div>

				<div class="mt-3">
					<flux:text>Total Referrals: {{ $total }}</flux:text>
				</div>
			</div>

			<flux:separator/>

			<div class="max-w-lg">
				<flux:heading class="mb-6">Old Codes</flux:heading>

				<flux:table :paginate="$rows">
					<flux:table.columns>
						<flux:table.column>Code</flux:table.column>
						<flux:table.column>Sign Ups</flux:table.column>
						<flux:table.column>Deleted</flux:table.column>
					</flux:table.columns>

					<flux:table.rows>
						@foreach($rows as $row)
							<flux:table.row :key="$row->id">
								<flux:table.cell>{{ $row->code }}</flux:table.cell>
								<flux:table.cell>{{ $row->users_count ?? 0 }}</flux:table.cell>
								<flux:table.cell>{{ $row->deleted_at }}</flux:table.cell>
							</flux:table.row>
						@endforeach
					</flux:table.rows>
				</flux:table>
			</div>
		</div>

	</section>
</div>
