<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyUsersPasswordResetToken
 *
 * @property string $email
 * @property string $token
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUsersPasswordResetToken whereToken($value)
 * @mixin \Eloquent
 */
class CompanyUsersPasswordResetToken extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $table ='company_users_password_reset_tokens';
}
