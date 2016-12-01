<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name', 'address',
    ];

	public function setSongPercentAttribute($value)
	{
		$this->attributes['song_percent'] = empty($value) ? null : $value;
	}

	public function setSalaryAttribute($value)
	{
		$this->attributes['salary'] = empty($value) ? '0' : $value;
	}

	public function users()
	{
		return $this->belongsToMany('App\Models\User');
	}

	public function incomes(){
		return $this->hasMany('App\Models\Income');
	}

}

