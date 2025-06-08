<?php

namespace App\Models;

use App\Concerns\ModelActivityLogOptions;
use App\Concerns\ModelCreatedByAdmin;
use App\Concerns\ModelHasActiveState;
use App\Contracts\ModelWithLogActivity;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class OurService extends Model implements ModelWithLogActivity
{
    use HasFactory,
        HasUlids,
        LogsActivity,
        ModelActivityLogOptions,
        ModelCreatedByAdmin,
        ModelHasActiveState,
        SoftDeletes;

    protected $fillable = [
        'image',
        'background_image',
        'title',
        'description',
        'name_from',
        'year_from',
        'is_active',
        'created_by_id',
        'updated_by_id',
        'deleted_by_id',
    ];
}
