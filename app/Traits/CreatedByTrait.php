<?php

namespace App\Traits;

use App\Models\User;

trait CreatedByTrait
{

    public static function bootCreatedByTrait()
    {
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->id();
            });
        }
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(
            [
                'name' => '---',
            ]
        );
    }
}
