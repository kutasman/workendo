<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name', 'address', 'salary', 'song_percent', 'salary_type_id'
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

	public function salaryType()
	{
		return $this->belongsTo('App\Models\SalaryType');
	}
}

