<?php

namespace App\Enums;

enum UserRole: int {
	case Reader = 1;
	case User = 10;
	case Admin = 50;

	public function gt(self $role): bool {
		return $this->value >= $role->value;
	}
}
