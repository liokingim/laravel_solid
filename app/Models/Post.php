<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        // 'uuid',
        'title',
        'body',
    ];

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    // /**
    //  * uuid를 이벤트로 생성하고 싶은 경우
    //  */
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($model) {
    //         if (empty($model->{$model->getKeyName()})) {
    //             $model->{$model->getKeyName()} = Str::uuid();
    //         }
    //     });
    // }
}
