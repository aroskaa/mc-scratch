<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['questions', 'answers', 'status'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
