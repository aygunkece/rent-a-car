<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\MemberVerify
 *
 * @property-read \App\Models\Member|null $member
 * @method static \Illuminate\Database\Eloquent\Builder|MemberVerify newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberVerify newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberVerify query()
 * @mixin \Eloquent
 */
class MemberVerify extends Model
{
    protected $guarded = [];

    protected $table = 'members_verify';

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
