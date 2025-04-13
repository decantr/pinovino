<?php

namespace App\Livewire\Forms;

use App\Enums\BottleSize;
use App\Enums\WineType;
use App\Models\Bottle;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BottleForm extends Form
{
	public ?Bottle $bottle = null;

	#[Validate(['required', 'string'])]
	public $name;

	#[Validate(['required', 'numeric', 'integer', 'min:1900', 'max:2050'])]
	public $vintage = 2025;

	#[Validate([['required', new Enum(WineType::class)]])]
	public $wine_type = WineType::Red;

	#[Validate(['nullable', 'string'])]
	public $country;

	#[Validate(['nullable', 'string'])]
	public $region;

	#[Validate(['nullable', 'string'])]
	public $description;

	#[Validate(['nullable', 'string'])]
	public $producer;

	#[Validate(['required', new Enum(BottleSize::class)])]
	public $size = BottleSize::Standard;

	#[Validate([
		'files' => ['nullable', 'array'],
		'files.*' => ['image', 'mimes:jpeg,jpg,png,gif,webp'],
	])]
	public $files;

	public function set(Bottle $bottle): void {
		$this->bottle = $bottle;
		$this->fill($bottle->toArray());
	}

	public function save(): void {
		$validated = $this->validate();

		if ($this->bottle) {
			$this->bottle->update($validated);
			$bottle = $this->bottle;
		} else {
			$bottle = Bottle::create($validated);
		}

		if (! empty($this->files)) {
			foreach ($this->files as $file) {
				$bottle->addMedia($file)->toMediaCollection('photographs');
			}
		}
	}
}
