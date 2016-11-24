<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{

	protected $carbonDateFormat = 'Y-m-d';

	protected $fillable = [
        'date', 'songs', 'company_id', 'user_id', 'tip',
    ];

	public function users()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function companies()
	{
		$this->belongsTo('App\Models\Company');
	}

	//Mutators

	public function setSongsAttribute($value)
	{
		$this->attributes['songs'] = $value ? $value : 0;
	}

	public function setTipAttribute($value)
	{
		$this->attributes['tip'] = $value ? $value : 0;
	}




	public function getCarbonDate()
	{
		return Carbon::createFromFormat($this->carbonDateFormat, $this->attributes['date']);
	}

}
