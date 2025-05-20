<?php

namespace MahdiawanNK\PermissionGroup\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    protected $fillable = ['name', 'permission_group_id', 'description'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id');
    }
}