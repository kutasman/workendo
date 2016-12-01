<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'income_type_name', 'income_type_slug', 'income_type_desc',	'value', 'rules'
    ];

    public function incomes()
    {
    	return $this->belongsToMany('App\Models\Income');
    }

    protected $casts= [
    	'rules' => 'json',
    ];
}
