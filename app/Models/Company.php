<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property-write mixed $song_percent
 * @property-write mixed $salary
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Income[] $incomes
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Company whereUpdatedAt($value)
 */
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

