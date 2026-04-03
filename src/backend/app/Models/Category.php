<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $fillable = [
        'familyId',
        'userId',
        'name',
        'color',
        'icon',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class, 'familyId', '_id');
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'categoryId', '_id');
    }
}
