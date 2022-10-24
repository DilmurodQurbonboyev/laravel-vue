<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Authority extends Model implements TranslatableContract
{
    use Translatable;

    public $useTranslationFallback = true;

    public $translatedAttributes = ['title'];

    protected $fillable = [
        'code',
        'status',
        'creator_id',
        'modifier_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function modifiers()
    {
        return $this->belongsTo(User::class, 'modifier_id');
    }

    public function authorityTranslation()
    {
        return $this->hasMany(AuthorityTranslation::class);
    }
}
