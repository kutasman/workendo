<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Income
 *
 * @property-read \App\Models\Company $companies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IncomeType[] $incomeTypes
 * @property-write mixed $rules
 * @mixin \Eloquent
 */
class Income extends Model
{
    protected $fillable = [
    	'description', 'type', 'rules', 'income_type_slug'
    ];

    public $timestamps = false;

    protected $casts = [
    	'rules' => 'json'
    ];

    public function companies()
    {
    	return $this->belongsTo('App\Models\Company');
    }

    public function incomeTypes()
    {
    	return $this->belongsToMany('App\Models\IncomeType');
    }

    public function rules()
    {
    	$rules = collect($this->attributes['rules']);
    	return $rules;
    }
}
