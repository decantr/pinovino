<div>
	<div>
		<flux:card>
			<div class="flex">
				<div class="">
					<flux:heading class="inline!" size="xl">
						<flux:text class="inline! tabular-nums">{{ $bottle->vintage }}</flux:text>

						{{ $bottle->name }}
					</flux:heading>

					<flux:subheading>
						{{ $bottle->country }}
					</flux:subheading>
				</div>

				<flux:spacer />

				<div>
					<flux:button
						:href="route('bottle.index')"
						icon="x-mark"
					/>
				</div>
			</div>


			<flux:text class="my-12">
				{!! $bottle->description !!}
			</flux:text>

			<div class="flex gap-3 flex-wrap">
				@foreach($bottle->media as $media)
					<x-bottle.photo :$media />
				@endforeach
			</div>
		</flux:card>


	</div>
</div>
