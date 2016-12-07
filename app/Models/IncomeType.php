<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IncomeType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Income[] $incomes
 * @mixin \Eloquent
 * @property integer $id
 * @property string $income_type_name
 * @property string $income_type_slug
 * @property string $income_type_desc
 * @method static \Illuminate\Database\Query\Builder|\App\Models\IncomeType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\IncomeType whereIncomeTypeName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\IncomeType whereIncomeTypeSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\IncomeType whereIncomeTypeDesc($value)
 */
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
