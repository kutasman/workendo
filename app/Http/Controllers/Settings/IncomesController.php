<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Income;
use App\Models\IncomeType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomesController extends Controller
{

	protected $rules = [
		'description' => 'string|max:255',
		'income_type_slug' => 'string|max:45|required',
		'company_id' => 'numeric|required|min:0',
		'rules' => 'required',
		'rules.song.*.value' => 'numeric|min:0',
	];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
    	if (\Laratrust::can('income-create')){
		    $days = [
			    '1' => 1,
			    '2' => 2,
			    '3' => 3,
			    '4' => 4,
			    '5' => 5,
			    '6' => 6,
			    '7' => 7,
		    ];
    		$income_types = IncomeType::all()->mapWithKeys(function ($type){
    			return [$type['income_type_slug'] => $type['income_type_name']];
		    });
    		$company = \Auth::user()->companies()->find($company_id);
		    return view('settings.incomes.create', compact('income_types', 'company', 'days'));
	    } else {
			return redirect()->back()->with('permission_denied', 'You can\'t create income');
	    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {

	    $this->validate($request, $this->getRules());

	    $params = $request->all();
	    $params['rules'] = $request->get('rules')[$request->get('income_type_slug')];

	    Company::find($company_id)->incomes()->create($params);
	    return redirect()->route('settings');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $company_id)
    {

    	Income::destroy($id);


        return redirect()->route('settings');
    }

    private function getRules()
    {
    	return $this->rules;
    }
}
