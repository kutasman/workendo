<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Laratrust;
use Auth;

class CompaniesController extends Controller
{
	protected $companies;

	protected $validateRules = [
		'name' => 'required|max:255',
		'address' => 'max:255',
		'salary' => 'required|numeric|max:10000|min:0',
		'song_percent' => 'numeric|max:100|min:0',
	];

	public function __construct(Company $company) {
		$this->companies = $company;
	}

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if( Laratrust::can('company-create')){

		    $this->validate($request, $this->getValidateRules());

		    Auth::user()->companies()->create($request->all());

	    }
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
    	if (Laratrust::can('company-read')){
		    $company = Company::find($id);
		    return view('settings.companies.edit', compact('company'));
	    } else {
    		return redirect()->back();
	    }

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
        if(Laratrust::can('company-update')){
	        $this->validate($request, $this->getValidateRules());

	        $company = Company::find($id);
	        $company->fill($request->all());
	        $company->save();
        }

        return redirect()->route('settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (Laratrust::can('company-delete')){
		    Auth::user()->companies()->detach($id);
		    $this->companies->destroy($id);
	    }
	    return redirect()->route('settings');
    }

    private function getValidateRules()
    {
    	return $this->validateRules;
    }
}
