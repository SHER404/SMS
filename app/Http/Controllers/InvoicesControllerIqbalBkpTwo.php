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
        }])->with(['invoices' => function ($query) {
            $query->select('*')->with('invoice_heads');
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
           $head_ids = array();
           $head_paid = array();
           $head_discount = array();
           $head_amount = array();
           $head_decided = array();
           $head_mega_discount = array();
           $total_paying=array_sum($request->paid_amount);
           $total_amount=array_sum($request->head_amount);
           $total_discount=array_sum($request->discount_amount);
           $amount_to_pay=$total_amount-$total_discount;
           $session_starting='2022-03-01';
           $session_ending='2023-02-01';
           for($swap=0; $swap<count($request->head_id); $swap++){
                        $head_ids[$swap] = $request->head_id[$swap];
                        $head_amount[$swap] = $request->head_amount[$swap];
                        $head_decided[$swap] = $request->decided_amount[$swap];
                        $head_paid[$swap] = $request->paid_amount[$swap];
                        $head_mega_discount[$swap] = $request->mega_discount[$swap];
                        $head_discount[$swap] = $request->discount_amount[$swap];
           }
           for($i=strtotime($session_starting);$i<=strtotime($session_ending);$i=strtotime("+1 month", $i)){
            $fee_date=  date('Y-m-d',$i);
            $feemonth = date("m",$i);
            $feeyear = date("Y",$i);
            $feedata = PaidFees::select(DB::raw('sum(pay_amount) as total'),'student_id','invoice_id','fee_date')->where('student_id',$request->student_id)->whereYear('fee_date', $feeyear)->whereMonth('fee_date', '=', $feemonth)->first();
            if($total_paying>0){
                if($feedata->total){
                //info('Paid');
                for($h=0; $h<count($request->head_id); $h++){
                    $invoicehead = InvoiceHead::where('invoice_id',$feedata->invoice_id)->where('head_id',$request->head_id[$h])->first();
                        $pending_balance =$head_decided[$h]-$invoicehead->paid_amount;
                        info("Balance");
                        info($pending_balance);
                        $pay_now_amount=$pending_balance+$invoicehead->paid_amount;
                        $invoicehead->paid_amount =$pay_now_amount;
                        $invoicehead->update(); 
                        $feePayment=$this->payFee($request->student_id,$fee_date,$pending_balance,$feedata->invoice_id);
                        $credit=$head_paid[$h];
                        info('Credit');
                        info($credit);
                        $head_paid[$h]=$credit-$pending_balance;
                        $total_paying=$total_paying-$pending_balance;
                }
                
                 
            }else{
                $invoices=$this->createInvoice($request->student_id,$fee_date);
                for($h=0; $h<count($request->head_id); $h++){
                $credit=$head_paid[$h];
                $decided=$head_decided[$h];
                if($credit>$decided){
                    $pay_now_amouunt=$head_decided[$h];
                }else{
                    $pay_now_amouunt=$head_paid[$h];
                }
                $head = new InvoiceHead();
                $head->invoice_id = $invoices->id;
                $head->head_id = $request->head_id[$h];
                $head->head_amount = $request->head_amount[$h];
                $head->paid_amount = $pay_now_amouunt;
                $head->mega_discount = $request->mega_discount[$h];
                $head->discount_amount = $request->discount_amount[$h];
                $head->save();
                $feePayment=$this->payFee($request->student_id,$fee_date,$pay_now_amouunt,$invoices->id);
                info('Credit');
                info($credit);
                $remaining=$head_paid[$h];
                $head_paid[$h]=$remaining-$pay_now_amouunt;
                $total_paying=$total_paying-$pay_now_amouunt;
            }
           }
          }
           }
           dd('Bas');
        
        // Geting all data****************************** 
        // Geting all data 
        // Geting all data****************************** 
       
        $total_paying=array_sum($request->paid_amount);
        //$mega_discount=array_sum($request->mega_discount);
        //$total_paying=$total_paying-$mega_discount;
        $total_amount=array_sum($request->head_amount);
        $total_discount=array_sum($request->discount_amount);
        $amount_to_pay=$total_amount-$total_discount;
        $session_starting='2022-03-01';
        $session_ending='2023-02-01';
        $head_credits = array();
        
       //dd(''.$mega_discount);
        // Geting all data end******************************
        // Geting all data end
        // Geting all data end******************************            
       
        
    //    Loop for 12 months of this session******************************
    //    Loop for 12 months of this session
    //    Loop for 12 months of this session******************************
        for($i=strtotime($session_starting);$i<=strtotime($session_ending);$i=strtotime("+1 month", $i)){
            // Calculating Month and year from date 
            $fee_date=  date('Y-m-d',$i);
            //info($fee_date);
            $feemonth = date("m",$i);
            $feeyear = date("Y",$i);
            // Calculating Month and year from date  end
            // Geting old fee data  according to month
            $feedata = PaidFees::select(DB::raw('sum(pay_amount) as total'),'student_id','invoice_id','fee_date')->where('student_id',$request->student_id)->whereYear('fee_date', $feeyear)->whereMonth('fee_date', '=', $feemonth)->first();
            
            // Geting old fee data according to month  end
            if($total_paying>=$amount_to_pay && $feedata->total<$amount_to_pay){
                info('first if');
                

                ///////////////////////////////   Updating old heads  ///////////////////////
                if($feedata->invoice_id!=null){
                    info('first if and update');
                    for($h=0; $h<count($request->head_id); $h++){
                       

                        ////////****** Checking old head ******///////////
                        $invoicehead = InvoiceHead::where('invoice_id',$feedata->invoice_id)
                            ->where('head_id',$request->head_id[$h])
                            ->first();
                        ////////****** Checking old head ******///////////
                         ///////////////////////////**** Pending credit by heads****////////////////////////////////
                         $pending_balance = $request->decided_amount[$h]-$invoicehead->paid_amount;
                         $head_credits[$h] = $request->paid_amount[$h]-$pending_balance;
                     
                         ///////////////////////////**** Pending credit by heads****////////////////////////////////
                           
                            $balance_paid =$request->decided_amount[$h];
                            $invoicehead->mega_discount = $request->mega_discount[$h];
                            $invoicehead->paid_amount = $balance_paid;
                            $invoicehead->update(); 
                            info($invoicehead);
                            $feePayment=$this->payFee($request->student_id,$fee_date,$pending_balance,$feedata->invoice_id);
                            $total_paying=$total_paying-$pending_balance;
                    }

                  
                    ///////////////////////////////   Updating old heads end ///////////////////////
                }else{
                    info('first if and create');
                    $total_paying=$total_paying-$amount_to_pay;
                     ///////////////////////////////   Creating new heads end ///////////////////////
                     $invoices=$this->createInvoice($request->student_id,$fee_date);
                     $feePayment=$this->payFee($request->student_id,$fee_date,$amount_to_pay,$invoices->id);
                     // Genrating invoice heads 
                     for($h=0; $h<count($request->head_id); $h++){
                    ///////////////////////////**** Pending credit by heads****////////////////////////////////
                    
                    $head_credits[$h] = $request->paid_amount[$h]-$request->decided_amount[$h];
                    ///////////////////////////**** Pending credit by heads****////////////////////////////////

                    
                    $final_paid = $request->head_amount[$h]-$request->discount_amount[$h];
                   
                        $head = new InvoiceHead();
                        $head->invoice_id = $invoices->id;
                        $head->head_id = $request->head_id[$h];
                        $head->head_amount = $request->head_amount[$h];
                        $head->paid_amount = $final_paid;
                        $head->mega_discount = $request->mega_discount[$h];
                        $head->discount_amount = $request->discount_amount[$h];
                        $head->save();
                        info($head);
                     }

                // Genrating invoice heads end

                      ///////////////////////////////   Creating new heads end ///////////////////////
                }
  
            }else{
                // Checking and entering total remaining amount 
                if($total_paying>0  && $feedata->total<$amount_to_pay){ 
                    info('else'); 

                     ////////////////////////////////Update old heads /////////////////////
                     if($feedata->invoice_id!=null){
                        info('Update if');
                        for($h=0; $h<count($request->head_id); $h++){
                            ////////****** Checking old head ******///////////
                            $invoicehead = InvoiceHead::where('invoice_id',$feedata->invoice_id)
                                ->where('head_id',$request->head_id[$h])
                                ->first();
                            ////////****** Checking old head ******///////////
                                if(array_key_exists($h, $head_credits)){
                                    $invoicehead->paid_amount = $head_credits[$h];
                                }else{
                                    $pending_balance = $request->decided_amount[$h]-$invoicehead->paid_amount;
                                    if($pending_balance>0){
                                      if($pending_balance<=$request->paid_amount[$h]){
                                        $invoicehead->paid_amount = $invoicehead->paid_amount+$pending_balance;
                                        $paying_amount=$pending_balance;
                                        $head_credits[$h] = $request->paid_amount[$h]-$paying_amount;

                                      }else{
                                        $invoicehead->paid_amount =$invoicehead->paid_amount+$request->paid_amount[$h];
                                        $paying_amount=$request->paid_amount[$h];

                                      }
                                        

                                    }else{
                                        $paying_amount=0;
                                        $invoicehead->paid_amount=$invoicehead->paid_amount;
                                    }
                                      
                                }
                                $invoicehead->mega_discount = $request->mega_discount[$h];
                                $invoicehead->update(); 
                                info($invoicehead);
                                $feePayment=$this->payFee($request->student_id,$fee_date,$paying_amount,$feedata->invoice_id);
                                $total_paying=$total_paying-$paying_amount;
                        }
                        

                     }else{
                        info('Create if');
                        ////////////////////////////////Creating new  old heads /////////////////////
                        $invoices=$this->createInvoice($request->student_id,$fee_date);
                         for($h=0; $h<count($request->head_id); $h++){
                            if(array_key_exists($h, $head_credits)){
                                $paying=$head_credits[$h];
                            }else{
                                $paying=$request->paid_amount[$h];
                            }
                         $head = new InvoiceHead();
                         $head->invoice_id = $invoices->id;
                         $head->head_id = $request->head_id[$h];
                         $head->head_amount = $request->head_amount[$h];
                         $head->paid_amount = $paying;
                         $head->mega_discount = $request->mega_discount[$h];
                         $head->discount_amount = $request->discount_amount[$h];
                         $head->save();
                         info($head);
                    
                         }
                        $feePayment=$this->payFee($request->student_id,$fee_date,$total_paying,$invoices->id);
                        $total_paying=$total_paying-$total_paying;
                     }
                     
                       

                     









                
                

                }
                
                // Checking and entering total remaining amount end

            }
            
         }
         
        
    //    Loop for 12 months of this session end******************************
    //    Loop for 12 months of this session end
    //    Loop for 12 months of this session end******************************

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
                           ->with(['student' => function ($query) {
                            $query->select('*')->with(['invoices' => function ($query) {
                                $query->select('*')->with('invoice_heads');
                                }]);
                            }])
                           ->with(['student'=> function ($query) {
                            $query->select('*')->with('father')->with('fee');
                            }])
                           
                           
                         ->first();
       //info($data->student->invoices[0]->invoice_heads);
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
    

    public function payFee($student_id,$fee_date,$amount,$invoice_id){

        $PaidFees = new PaidFees();
        $PaidFees->student_id=$student_id;
        $PaidFees->fee_date=$fee_date;
        $PaidFees->pay_amount=$amount;
        $PaidFees->invoice_id =$invoice_id;
        $PaidFees->save();
        return $PaidFees;

    }
    public function createInvoice($student_id,$fee_date){

                    $invoices = new Invoices();
                    $invoices->student_id=$student_id;
                    $invoices->invoice_id=$this->generateInvoiceId();
                    $invoices->fee_date=$fee_date;
                    $invoices->save();
                    return $invoices;
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
