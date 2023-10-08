<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campuses;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus =$this->globalSettings();
        $data = FeeHead::where('campus_id',$campus->id)->get();

        return view('modules.fee-head.index',compact(['data']));
    }
    public static function all_feeheads()
    {
        $campus_id=Auth::user()->campus_id;
        $data = FeeHead::where('campus_id',$campus_id)->with(['Invoice_heads'=>function($q){
            $campus_id=Auth::user()->campus_id;
            $campus = campuses::find($campus_id);
            $q->where('session_id',$campus->active_session);
        }])->get();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.fee-head.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $campus =$this->globalSettings();
        $feeHead = FeeHead::create($request->post()+ ['campus_id' => $campus->id]);
        $history = $this->newlog('fee-head',$feeHead->id,'Create','New Fee Head Created');

        return redirect()->route('fee-head.index')->with('success','Fee has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function show(FeeHead $feeHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function edit($feeHead)
    {
        $data = FeeHead::find($feeHead);

        return view('modules.fee-head.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$feeHead)
    {
        $data = FeeHead::find($feeHead);
        $history = $this->newlog('fee-head',$data->id,'Update','Fee Head Updated');
        $data->update($request->all());
        return redirect()->route('fee-head.index')->with('success','Fee has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function destroy($feeHead)
    {
        $feeHead = FeeHead::find($feeHead); 
        $history = $this->newlog('fee-head',$feeHead->id,'Delete','Fee Head Deleted');
        $feeHead->delete();

        return response(['msg'=>'Deleted'], 200);
    }
}
