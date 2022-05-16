<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'level1',
        'level2',
        'level3',
        'price',
        'price_sp',
        'amount',
        'properties',
        'purchases',
        'unit',
        'picture',
        'conclusion',
        'description'
    ];

}
