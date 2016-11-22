<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{

	protected $carbonDateFormat = 'Y-m-d';

	protected $fillable = [
        'date', 'songs', 'place_id', 'user_id', 'tip',
    ];

	public function users()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function getCarbonDate()
	{
		return Carbon::createFromFormat($this->carbonDateFormat, $this->attributes['date']);
	}

}
