<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
    	'name', 'address', 'salary', 'song_percent'
    ];

	public function setSongPercentAttribute($value)
	{
		$this->attributes['song_percent'] = empty($value) ? null : $value;
	}

	public function setSalaryAttribute($value)
	{
		$this->attributes['salary'] = empty($value) ? '0' : $value;
	}
}

