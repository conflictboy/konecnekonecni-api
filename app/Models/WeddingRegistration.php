<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'escorts',
        'children',
        'isAttending',
        'transport',
    ];

    protected $casts = [
        'isAttending' => 'boolean',
    ];

    protected function escorts(): Attribute
    {
        return Attribute::make(
            set: fn(array $value) => implode(', ', array_map(function ($item) {
                return trim(($item['firstname']) . ' ' . ($item['lastname']));
            }, $value)),
        );

    }

    protected function children(): Attribute
    {
        return Attribute::make(
            set: fn(array $value) => implode(', ', array_column($value, 'name')),
        );

    }
}
