<?php

namespace App\Http\Controllers;
use App\Models\Town;
use App\Models\FeeHead;
use App\Models\StudentsFee;
use App\Models\Students;
use App\Models\StudentParent;
use App\Models\StudentClass;
use App\Models\StudentHealth;
use App\Models\Family;
use App\Models\Employees;
use App\Models\ClassSection;
use App\Models\AcademicSession;
use Redirect;
use DB;
use App\Models\Campuses;
use App\Models\Country;
use App\Models\City;
use App\Models\StudentLanguage;
use App\Models\EmergencyPhone;
use App\Models\RescuePhone;
use App\Models\FamilyMember;
use App\Models\PaidFees;
use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Models\InvoiceHead;

class InvoicesController extends Controller
{
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
    {    $id=$_REQUEST['id'];
       $feedate=$_REQUEST['feedate'];
        $data = Students::where('id',$id)->with('fee')->with('father')->with(['fee' => function ($query) {
            $query->select('*')->with('feeHead');
        }])->first();
       
        return view('modules.invoices.add',compact(['data','feedate']));
       
       
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $time = strtotime($request->fee_date);
        $month = date("m",strtotime("-1 month",$time));
        $year = date("Y",strtotime("-1 month",$time));
        $total_paying=array_sum($request->paid_amount);
        $total_amount=array_sum($request->head_amount);
        $total_discount=array_sum($request->discount_amount);
        $amount_to_pay=$total_amount-$total_discount;
       
        $data = PaidFees::select(DB::raw('sum(pay_amount) as total'),'student_id','invoice_id','fee_date')->where('student_id',$request->student_id)->whereYear('fee_date', $year)->whereMonth('fee_date', '=', $month)->first();
       
    
             if($data->total>0){
                if($data->total<$amount_to_pay){
               // dd($data->total);
                $final_amount=$amount_to_pay-$data->total;
                   if($final_amount<=$total_paying){
                    
                    
                   
                    $PaidFees = new PaidFees();
                    $PaidFees->student_id=$data->student_id;
                    $PaidFees->fee_date=$data->fee_date;
                    $PaidFees->pay_amount=$final_amount;
                    $PaidFees->invoice_id = $data->invoice_id;
                    $PaidFees->save();
                    for($i=0; $i<count($request->head_id); $i++){
                        $final_paid = $request->head_amount[$i]-$request->discount_amount[$i];
                        $oldhead =[];
                        $oldhead['paid_amount'] = $final_paid;
                        $affectedRows = InvoiceHead::where('invoice_id', '=', $data->invoice_id)->where('head_id', '=', $request->head_id[$i])->update($oldhead);   
                    }
                   
                    $invoices = new Invoices();
                    $invoices->student_id=$request->student_id;
                    $invoices->invoice_id=$this->generateInvoiceId();
                    $invoices->fee_date=$request->fee_date;
                    $invoices->save();

                    $total_paying=array_sum($request->paid_amount);
                    $rem=$total_paying-$final_amount;
                    //dd($rem);
                    $PaidFeesN = new PaidFees();
                    $PaidFeesN->student_id=$request->student_id;
                    $PaidFeesN->fee_date=$request->fee_date;
                    $PaidFeesN->pay_amount=$rem;
                    $PaidFeesN->invoice_id = $invoices->id;
                    $PaidFeesN->save();

                    for($i=0; $i<count($request->head_id); $i++){
                        $head = new InvoiceHead();
                        $head->invoice_id = $invoices->id;
                        $head->head_id = $request->head_id[$i];
                        $head->head_amount = $request->head_amount[$i];
                        $head->paid_amount = $request->paid_amount[$i];
                        $head->discount_amount = $request->discount_amount[$i];
                        $head->save();   
                        
                    }

                    

                }
            }
                

            }else{
                //dd('else');
                $invoices = new Invoices();
                $invoices->student_id=$request->student_id;
                $invoices->invoice_id=$this->generateInvoiceId();
                $invoices->fee_date=$request->fee_date;
               
                $invoices->save();
                for($i=0; $i<count($request->head_id); $i++){
                    $head = new InvoiceHead();
                    $head->invoice_id = $invoices->id;
                    $head->head_id = $request->head_id[$i];
                    $head->head_amount = $request->head_amount[$i];
                    $head->paid_amount = $request->paid_amount[$i];
                    $head->discount_amount = $request->discount_amount[$i];
                    $head->save();   
                    
                }
                 ////////    Paid fees ////////
          $PaidFees = new PaidFees();
          $PaidFees->student_id=$request->student_id;
          $PaidFees->fee_date=$request->fee_date;
          $PaidFees->pay_amount=$request->total_amount;
          $PaidFees->invoice_id = $invoices->id;
          $PaidFees->save();

          ////////    Paid fees ////////
            }
       

        
       

       
         
        
        
       

        return redirect()->route('paid-fees.index')->with('success','invoice has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoices)
    {
       
        $id=$_REQUEST['id'];
        $fee_month=$_REQUEST['feemonth'];
        $fee_year=$_REQUEST['feeyear'];
        
         $data = invoices::where('student_id',$id)
                           ->whereYear('fee_date', $fee_year)
                           ->whereMonth('fee_date', '=', $fee_month)
                           ->with('invoice_heads')
                           ->with(['invoice_heads'=> function ($query) {
                            $query->select('*')->with('feeHead');
                            }])
                           ->with('student')
                           ->with(['student'=> function ($query) {
                            $query->select('*')->with('father')->with('fee');
                            }])
                           
                           
                         ->first();
       //dd($data->student->fee[0]);
         return view('modules.invoices.show',compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices $invoices)
    {
        //
    }
    public function generateInvoiceId(){

        $trackingid = rand(100000,999999);

        return $this->checkInvoiceId($trackingid);

    }
    public function checkInvoiceId($trackingdid){

        $verifytrackingid = invoices::where('invoice_id', $trackingdid)->get();

        if(count($verifytrackingid) == 0){

            return $trackingdid;

        }else{

            return $this->generateInvoiceId();
        }

    }
}
