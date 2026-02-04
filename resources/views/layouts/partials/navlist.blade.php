<flux:sidebar.item
	:current="request()->routeIs('dashboard')"
	:href="route('dashboard')"
	icon="home"
	wire:navigate
>
	{{ __('Dashboard') }}
</flux:sidebar.item>

@can('view-any', \App\Models\Bottle::class)
	<flux:sidebar.item
		:current="request()->routeIs('bottle.*')"
		:href="route('bottle.index')"
		icon="list-bullet"
		wire:navigate
	>
		Wine List
	</flux:sidebar.item>
@endcan

@can('view-any', \App\Models\Purchase::class)
	<flux:sidebar.item
		:current="request()->routeIs('purchase.*')"
		:href="route('purchase.index')"
		icon="banknotes"
		wire:navigate
	>
		Purchases
	</flux:sidebar.item>
@endcan

@can('view-any', \App\Models\Rating::class)
	<flux:sidebar.item
		:current="request()->routeIs('rating.*')"
		:href="route('rating.index')"
		icon="star"
		wire:navigate
	>
		Ratings
	</flux:sidebar.item>
@endcan
