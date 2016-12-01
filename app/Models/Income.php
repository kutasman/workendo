<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
    	'description', 'type', 'rules', 'income_type_id'
    ];

    public $timestamps = false;

    public function companies()
    {
    	return $this->belongsTo('App\Models\Company');
    }

    public function incomeTypes()
    {
    	return $this->belongsToMany('App\Models\IncomeType');
    }

    public function setRulesAttribute($value)
    {
    	$this->attributes['rules'] = json_encode($value);
    }
}
