<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Shift
 *
 * @property-read \App\Models\User $users
 * @property-read \App\Models\Company $company
 * @property-write mixed $songs
 * @property-write mixed $tip
 * @mixin \Eloquent
 * @property integer $id
 * @property string $date
 * @property integer $company_id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereSongs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereTip($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Shift whereUpdatedAt($value)
 */
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

	public function company()
	{
		return $this->belongsTo('App\Models\Company');
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
