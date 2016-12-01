<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\IncomeType;
use Illuminate\Http\Request;

class IncomesController extends Controller
{

	protected $rules = [
		'income_name' => 'required|max:45|string',
		'description' => 'max:255|string',
		'value' => 'required|numeric',
		'type' => 'required|string|max:45',

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
    		$income_types = IncomeType::all()->mapWithKeys(function ($type){
    			return [$type['income_type_slug'] => $type['income_type_name']];
		    });
    		$company = \Auth::user()->companies()->find($company_id);
		    return view('settings.incomes.create', compact('income_types', 'company'));
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
    	$params = $request->all();
	    $params['income_type_id'] = IncomeType::where('income_type_slug', $request->get('income_type_slug'))->first()->id;
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
    public function destroy($id)
    {
        //
    }

    private function getRules()
    {
    	return $this->rules;
    }
}
