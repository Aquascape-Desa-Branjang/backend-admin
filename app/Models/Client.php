<?php

namespace App\Models;

use App\Concerns\ModelActivityLogOptions;
use App\Concerns\ModelCreatedByAdmin;
use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Client extends Model implements ModelWithLogActivity
{
    use HasFactory,
        HasUlids,
        LogsActivity,
        ModelActivityLogOptions,
        ModelCreatedByAdmin,
        SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'position',
        'description',
        'created_by_id',
        'updated_by_id',
        'deleted_by_id',
    ];
}
