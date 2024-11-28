<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{

    protected $table = 'faqs';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['questions', 'answers', 'status'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
