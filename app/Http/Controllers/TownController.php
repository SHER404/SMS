<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Town::all();
        return view('modules.town.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $town = Town::all();
        return view('modules.town.add',compact(['town']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $town = Town::create($request->post());
        // $history = $this->newlog('class-section',$data->id,'Create','New Class Section Created');
        $history = $this->newlog('town', $town->id,'Create','New Town Created');

        return redirect()->route('town.index')->with('success','Town has been created successfully.');
    }
    public function newTown(Request $request){
        $data= Town::create($request->post());
        return response(['data'=>$data],200);

    }
    public function getTowns(Request $request)
    {
        $data= Town::where('country_id',$request->country_id)->where('city_id',$request->city_id)->get();
        return response(['data'=> $data],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit($town)
    {
        $data = Town::find($town);
        
        return view('modules.town.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        $data = Town::find($town);
        $data->update($request->all());
        return redirect()->route('town.index')->with('success','Town has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy($town)
    {
        $town = Town::find($town); 
        $town->delete();
        
        return response(['msg'=>'Deleted'], 200);
    }
}
