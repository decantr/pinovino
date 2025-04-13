<?php

namespace App\Enums;

enum UserRole: int {
	case Reader = 1;
	case User = 10;
	case Admin = 99;
}
