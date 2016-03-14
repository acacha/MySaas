<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleReportsDaily extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'total'
    ];
}
