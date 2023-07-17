<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Member
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @mixin \Eloquent
 */
class Member extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'fullname',
        'identity_number',
        'email',
        'phone',
        'password',
        'image',
        'birthday',
        'gender',
        'status',
        'confirm',
        'remember_token'];

    protected $table = 'members';

    protected $casts = [
      'email_verified_at' => 'datetime',
    ];


}
