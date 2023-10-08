<?php

namespace App\Http\Controllers;

use App\Models\Histories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $histories = Histories::with('user')->get();
        return view('modules.userlog.index', compact('histories')); 
       
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
        // $history = $request->all(['action','msg','module_id','module_type','campus_id','session_id','user_id']);
        // $history['user_id'] = Auth::user()->id;
        // Histories::create($history);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function show(Histories $histories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function edit(Histories $histories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histories $histories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histories $histories)
    {
        //
    }
}
