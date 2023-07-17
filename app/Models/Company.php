<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string|null $logo
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $land_phone
 * @property string|null $fax
 * @property string|null $tax_department
 * @property string|null $tax_number
 * @property string|null $address
 * @property string|null $website
 * @property int $confirm ön onaydan geçmiş firmanın bilgilerinin kontrol edildikten sonraki onay durumu
 * @property int $pre_confirm ilk defa kayıt olacak firmanın ön bilgilerinin onay durumu
 * @property int $status firmanın aktif veya pasif olma durumu
 * @property int $approve_agreement
 * @property string $auth_email
 * @property string $auth_name
 * @property string $auth_phone
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereApproveAgreement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAuthEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAuthName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAuthPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLandPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePreConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTaxDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use Notifiable;

    protected $fillable = [
        'logo',
        'name',
        'email',
        'phone',
        'land_phone',
        'fax',
        'tax_department',
        'tax_number',
        'address',
        'website',
        'confirm',
        'pre_confirm',
        'status',
        'approve_agreement',
        'auth_name',
        'auth_email',
        'auth_phone',
        'message'
    ];

    protected $table = 'companies';

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->auth_email;
    }
}
