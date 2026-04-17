<?php
declare(strict_types=1);

namespace App\Support;

final class Auth
{
    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function check(): bool
    {
        self::start();
        return !empty($_SESSION['user']);
    }

    public static function login(array $user): void
    {
        self::start();
        $_SESSION['user'] = $user;
    }

    public static function logout(): void
    {
        self::start();
        $_SESSION = [];
        session_destroy();
    }
}

