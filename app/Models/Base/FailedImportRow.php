<?php

namespace Filament\Actions\Imports\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property array $data
 * @property string | null $validation_error
 * @property-read Import $import
 */
class FailedImportRow extends Model
{
    use HasUlids;
    use Prunable;

    protected $table = 'base_failed_import_rows';

    protected $casts = [
        'data' => 'json',
    ];

    protected $guarded = [];

    public function import(): BelongsTo
    {
        return $this->belongsTo(app(Import::class)::class);
    }

    public function prunable(): Builder
    {
        return static::where(
            'created_at',
            '<=',
            now()->subMonth(),
        );
    }
}
