<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryType extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'type', 'description'
    ];

    public function companies()
    {
    	return $this->hasMany('App\Models\Company');
    }
}
