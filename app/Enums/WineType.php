<?php

namespace App\Enums;

enum WineType: string
{
	case Red = 'red';
	case White = 'white';
	case Rose = 'rose';
	case Sparkling = 'sparkling';

	public function colour(): string {
		return match ($this) {
			self::Red => BadgeColour::Red->value,
			self::White => BadgeColour::Zinc->value,
			self::Rose => BadgeColour::Pink->value,
			self::Sparkling => BadgeColour::Yellow->value,
		};
	}
}
