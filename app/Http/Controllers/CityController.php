<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = City::all();
        return view('modules.city.index',compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.city.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // City::create($request->post());
        $city = City::create($request->post());
        $history = $this->newlog('city',$city->id,'Create','New City Created');
        return redirect()->route('city.index')->with('success','city has been created successfully.');
    }
    public function newCity(Request $request){
        $data= City::create($request->post());
        return response(['data'=>$data],200);

    }
    public function getCities(Request $request)
    {
        $data= City::where('country_id', $request->country_id)->get();
        return response(['data'=> $data],200);
    }
    public function createtownModel(){
        $cities=  City::get();
        $countries=  Country::get();
        return view('modules.students.includes.create_town_model',compact(['cities','countries']));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        return view('modules.city.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($city)
    {
        
        
        $data = city::find($city);
        
        return view('modules.city.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$city)
    {
        
        $data = city::find($city);
        $history = $this->newlog('city',$data->id,'Update','City Updated');
        $data->update($request->all());
        return redirect()->route('city.index')->with('success','city has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($city)
    {
        $city = city::find($city); 
        $history = $this->newlog('city',$city->id,'Delete','City Deleted');
        $city->delete();
        return response(['msg'=>'Deleted'], 200);
    }
}
