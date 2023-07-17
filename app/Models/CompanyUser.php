<?php

namespace App\Models;

use App\Builders\CompanyUserBuilder;
use App\Observers\CompanyObserver;
use Illuminate\Auth\MustVerifyEmail;
use \Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\CompanyUser
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $phone
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyUser extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_id'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $table = "company_users";

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function newEloquentBuilder($query): CompanyUserBuilder
    {
        return new CompanyUserBuilder($query);
    }



}
