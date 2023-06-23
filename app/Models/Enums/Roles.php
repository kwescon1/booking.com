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

    public function resolveAdmin()
    {
        return self::ROLE_ADMINISTRATOR->value;
    }

    public function resolveOwner()
    {
        return self::ROLE_OWNER->value;
    }

    public function resolveUser()
    {
        return self::ROLE_USER->value;
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
