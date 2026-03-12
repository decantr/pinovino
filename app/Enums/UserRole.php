<?php

namespace App\Enums;

enum UserRole: int
{
	case Reader = 1;
	case User = 10;
	case Admin = 50;

	public function gte(self $role): bool {
		return $this->value >= $role->value;
	}

	public function lte(self $role): bool {
		return $this->value <= $role->value;
	}
}
