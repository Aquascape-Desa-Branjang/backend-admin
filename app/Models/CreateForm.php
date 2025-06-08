<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateForm extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'subject',
        'message',
    ];
}
