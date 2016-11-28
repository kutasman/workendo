<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class ShiftsController extends Controller
{

	protected $validateRules = [
		'company_id' => 'required|numeric|min:0',
		'date' => 'required|date|date_format:Y-m-d',
		'tip' => 'numeric|min:0',
	];

	public function __construct() {
		//$this->middleware('auth');
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
	    $companies = Auth::user()->companies;
	    $carbonToday = Carbon::today();
	    $today = $carbonToday->format('Y-m-d');
	    $yesterday = $carbonToday->subDay(1)->format('Y-m-d');

	    return view('shifts.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());

	    Auth::user()->shifts()->create($request->all());
	    return redirect()->route('home');
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
	    $shift = Shift::find($id);
	    $companies = Auth::user()->companies;
        return view('shifts.edit', compact('shift', 'companies'));
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
        $this->validate($request, $this->getRules());

	    $shift = Shift::find($id);

	    $shift->company_id = $request->get('company_id');
	    $shift->date = $request->get('date');
	    $shift->tip = $request->get('tip');
	    $shift->save();

	    return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shift::destroy($id);
	    return redirect()->route('home');

    }

    private function getRules()
    {
	    return $this->validateRules;
    }
}
