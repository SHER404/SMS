<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Country::all();
        return view('modules.country.index',compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.country.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Country::create($request->post());
        $country =  Country::create($request->post());
        $history = $this->newlog('country', $country->id,'Create','Country Created');

        return redirect()->route('country.index')->with('success','country has been created successfully.');
    }
    public function newCountry(Request $request){
        $data= Country::create($request->post());
        return response(['data'=>$data],200);

    }
    public function createcityModel(){
        $countries=  Country::get();
        return view('modules.students.includes.create_city_model',compact('countries'));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($country)
    {
        $data = country::find($country);
        
        return view('modules.country.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$country)
    {
        $data = country::find($country);
        $history = $this->newlog('country', $data->id,'Update','country Updated');
        $data->update($request->all());
        return redirect()->route('country.index')->with('success','country has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($country)
    {
        $country = country::find($country); 
        $history = $this->newlog('country', $country->id,'Delete','country Deleted');
        $country->delete();
        return response(['msg'=>'Deleted'], 200);
    }
}
