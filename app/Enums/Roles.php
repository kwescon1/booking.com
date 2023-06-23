<?php

namespace App\Models\Enums;

use Illuminate\Contracts\Support\DeferringDisplayableValue;

enum Roles: int implements DeferringDisplayableValue
{
    case ROLE_ADMINISTRATOR = 1;
    case ROLE_OWNER = 2;
    case ROLE_USER = 3;

    public function isAdministrator(): bool
    {
        return $this == self::ROLE_ADMINISTRATOR;
    }

    public function isOwner(): bool
    {
        return $this == self::ROLE_OWNER;
    }

    public function isUser(): bool
    {
        return $this == self::ROLE_USER;
    }

    public function resolveDisplayableValue(): string
    {
        return match (true) {
            $this->isAdministrator() => 'Administrator',
            $this->isOwner() => 'Owner',
            $this->isUser() => 'User',
        };
    }
}
