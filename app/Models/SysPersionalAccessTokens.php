<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class SysPersionalAccessTokens extends SanctumPersonalAccessToken
{
    use HasFactory;
    protected $table = 'sys_persional_access_tokens';
}
