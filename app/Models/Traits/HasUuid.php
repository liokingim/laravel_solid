<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasUuid
{

    /**
     * uuid를 이벤트로 생성하고 싶은 경우
     */
    protected static function bootHasUuid()
    {
        static::creating(function($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}