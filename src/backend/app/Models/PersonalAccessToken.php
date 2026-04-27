<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    // Força SQLite para evitar herança da conexão MongoDB do User pai
    protected $connection = 'sqlite';
}
