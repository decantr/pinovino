<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void {}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		/** search a text field for a case insensitive string */
		Builder::macro('search', function ($field, $string, $or = 'and') {
			/** @var \Illuminate\Database\Query\Builder $this */
			if (empty($string)) {
				return $this;
			}

			if (! \is_array($field)) {
				return $this->where($field, 'like', "%{$string}%", $or);
			}

			return $this->where(function (Builder $query) use ($field, $string, $or) {
				foreach ($field as $f) {
					$query->where($f, 'like', "%{$string}%", $or);
				}
			});
		});

		/** fluently apply a filter from a provided filters object */
		Builder::macro('apply', function ($filters, $name) {
			if (\is_array($name)) {
				foreach ($name as $n) {
					$filters->{$n}($this);
				}

				return $this;
			}

			return $filters->{$name}($this);
		});

		Number::useCurrency('GBP');
	}
}
