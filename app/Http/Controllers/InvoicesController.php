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
use PDF;
use Illuminate\Support\Facades\Auth;
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

     public function exportpdf(Request $request){
          
        $date=date('Y-m-d',strtotime($request->date));
        $date_form=date('Y-m-d h:m:s',strtotime($request->date));

        $data = Students::with('fee')->with('father')->with(['fee' => function ($query) {
            $query->select('*')->with('feeHead');
        }])->with(['invoices' => function ($query){
                $query->select('*')->with('invoice_heads');
        }])->whereIn('id',$request->ids)->get();
                $pdf = PDF::loadView('modules.ExportPdf.invoice',compact('data','date'));
                $path='assets/Bulk_Challan_1.pdf';
                //$pdf->save($path);
                return $pdf->download($path);
          
         return redirect()->to('generate-challan')->with('success', 'Sucessfull!'); 
        // return 'Success';  
     }
     public function exportpdfView(){
        $date=date('Y-m-d');
        $data = Students::with('fee')->with('father')->with(['fee' => function ($query) {
            $query->select('*')->with('feeHead');
        }])->with(['invoices' => function ($query) use($date){

            //    if($date){

            //       $month = date("m",strtotime($date));
            //       $year = date("Y",strtotime($date));
            //       $query->whereYear('fee_date', $year);
            //       $query->whereMonth('fee_date', '=', $month);


            //     }

                $query->select('*')->with('invoice_heads');
        }])->limit(10)->get();
        return view('modules.ExportPdf.invoice',compact('data','date'));;  
    }
     public function generateChallan(Request $request)
{    
            $campus =$this->globalSettings();
            $family_id=0;
            $class_id=0;
            $classes= StudentClass::where('campus_id',$campus->id)->get();
            $families= Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
            $query= Students::query();
            $query->with(['family','class']);
            $query->where('campus_id',$campus->id);
            if($request->class){
              $class_id=$request->class;
             
            }
            $query->where('class_id',$request->class);
            if($request->family){
                $family_id=$request->family;
                $query->where('family_id',$request->family);
            }
            $data=$query->get();
            ///dd($data);
            return view('modules.invoices.generateChallan',compact(['data','classes','families','family_id','class_id']));
    }

    public function index(Request $request)
{    
           $campus =$this->globalSettings();
            $students= Students::where('campus_id',$campus->id)->get();
            $families= Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
            $Head= FeeHead::where('campus_id',$campus->id)->get();
            $query= Invoices::query();
            $query->where('campus_id',$campus->id);
            $query->with('campus','academicSession');
            $query->with('Invoice_heads', function($q) use ($request){
                if($request->head){
                   
                    $q->where('head_id', $request->head);
                }   
            });
            $query->with('student', function($q) use ($request){
                if($request->family){
                   
                    $q->with('family')->where('family_id', $request->family);
                }   
            });
            if($request->student){
            $query->where('student_id',$request->student);
            }
            if($request->date){
            $month = date("m",strtotime($request->date));
            $year = date("Y",strtotime($request->date));
            $query->whereYear('fee_date', $year);
            $query->whereMonth('fee_date', '=', $month);
            }
            $data=$query->get();
            
            if($request->id){
                $data = Invoices::all();
                    return view('modules.invoices.single_invoice',compact(['data']));
            }

          

            




return view('modules.invoices.index',compact(['data','students','families','Head']));
}
     public static function total_invoices()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Invoices::where('campus_id',$campus_id)->where('session_id',$campus->active_session)->count();
        return $data;
    }
    public static function all_invoices()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Invoices::where('campus_id',$campus_id)->where('session_id',$campus->active_session)->with('Invoice_heads', function($q){
            $q->with('feeHead');
          })->get();
        return $data;
    }
    public static function all_invoices_limit()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Invoices::where('campus_id',$campus_id)->where('session_id',$campus->active_session)->with('student', function($q){
            $q->with('class');
          })->limit(5)->get();
        return $data;
    }
public function edit_single_invoice(Request $request){

    $invoice_id=$request->invoice_id;
    $invoice = Invoices::where('id',$invoice_id)
                       ->with('student', function($q){
                           $q->with('father')->with('emergencyPhone');
                         })
                         ->with('Invoice_heads', function($q){
                           $q->with('feeHead');
                         })
                        ->first();
   info($invoice);
    return view('modules.invoices.edit',compact(['invoice']));



}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_REQUEST['id'];
        $feedate = $_REQUEST['feedate'];
        $data = Students::where('id', $id)->with('fee')->with('father')->with(['fee' => function ($query) {
            $query->select('*')->with('feeHead');
        }])->with(['invoices' => function ($query) {
            $query->select('*')->with('invoice_heads');
        }])->first();
        return view('modules.invoices.add', compact(['data', 'feedate']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->paid_amount)){
            $campus = $this->globalSettings();

        $head_ids = array();
        $head_paid = array();
        $head_discount = array();
        $head_amount = array();
        $head_decided = array();
        $head_mega_discount = array();
        $paying_date = $request->fee_date;
        $paying_month = date("m", strtotime($paying_date));
        $total_paying = array_sum($request->paid_amount);
        $total_amount = array_sum($request->head_amount);
        $total_discount = array_sum($request->discount_amount);
        $total_mega_discount = array_sum($request->mega_discount);
        $amount_to_pay = $total_paying - $total_mega_discount;
        $campus=$this->globalSettingsBlade();
        $session_dates = Students::where('id', $request->student_id)->first();
        if($session_dates){
            $session_starting =$session_dates->fee_activation_date ?? $campus->session?->starting_year;
        }else{
            $session_starting =$campus->session?->starting_year;
        }
        if ($total_paying == 0) {
            $invoices = $this->createInvoice($request->student_id, $paying_date);
            for ($h = 0; $h < count($request->head_id); $h++) {
            $invoiceoldhead = InvoiceHead::where('invoice_id', $invoices->id)->where('head_id', $request->head_id[$h])->first();
            if ($invoiceoldhead) {

            } else {
                $head = new InvoiceHead();
                $head->invoice_id = $invoices->id;
                $head->campus_id = $campus->id;
                $head->session_id = $campus->active_session;
                $head->head_id = $request->head_id[$h];
                $head->head_amount = $request->head_amount[$h];
                $head->paid_amount = $request->paid_amount[$h];
                $head->mega_discount = $request->mega_discount[$h];
                $head->discount_amount = $request->discount_amount[$h];
                $head->save();
            }
        }  
        }

    
        $session_ending = $campus->session?->ending_year;
        for ($swap = 0; $swap < count($request->head_id); $swap++) {
            $head_ids[$swap] = $request->head_id[$swap];
            $head_amount[$swap] = $request->head_amount[$swap];
            $head_decided[$swap] = $request->decided_amount[$swap];
            $head_paid[$swap] = $request->paid_amount[$swap] - $request->mega_discount[$swap];
            $head_mega_discount[$swap] = $request->mega_discount[$swap];
            $head_discount[$swap] = $request->discount_amount[$swap];
        }
        for ($i = strtotime($session_starting); $i <= strtotime($session_ending); $i = strtotime("+1 month", $i)) {
            $fee_date =  date('Y-m-d', $i);
            $feemonth = date("m", $i);
            $feeyear = date("Y", $i);
            $feedata = PaidFees::select(DB::raw('sum(pay_amount) as total'), 'student_id', 'invoice_id', 'fee_date')->where('student_id', $request->student_id)->whereYear('fee_date', $feeyear)->whereMonth('fee_date', '=', $feemonth)->first();
            
           
            $data = Invoices::with('invoice_heads')->where('student_id', $request->student_id)->whereYear('fee_date', $feeyear)->whereMonth('fee_date', '=', $feemonth)->first();
            
            if ($total_paying > 0) {
                if ($data) {
                    $feedatainvoice_id=$data->id;
                    for ($h = 0; $h < count($request->head_id); $h++) {
                        if($head_paid[$h]!=0){
                           
                        $invoicehead = InvoiceHead::where('invoice_id', $feedatainvoice_id)->where('head_id', $request->head_id[$h])->first();
                        if($invoicehead){
                            $pending_balance = $head_decided[$h] - $invoicehead->paid_amount - $invoicehead->mega_discount;
                        if($pending_balance>0){
                            if($head_paid[$h]>=$pending_balance){
                               $pay_now_amount = $pending_balance + $invoicehead->paid_amount;
                            }else{
                               $pay_now_amount = $head_paid[$h] + $invoicehead->paid_amount;
                               $pending_balance=$head_paid[$h];
                            }
                        }else{
                            $pay_now_amount = $pending_balance + $invoicehead->paid_amount;
                        }
                       
                        $invoicehead->paid_amount = $pay_now_amount;
                        $invoicehead->update();
                        
                       
                        $feePayment = $this->payFee($request->student_id, $fee_date, $pending_balance, $feedatainvoice_id);
                        $credit = $head_paid[$h];
                        $head_paid[$h] = $credit - $pending_balance;
                        $total_paying = $total_paying - $pending_balance;

                        }
                        
                    }
                    }
                } else {
                    $check_empty = array_sum($head_paid);
                    if ($check_empty > 0) {
                        $invoices = $this->createInvoice($request->student_id, $fee_date);
                    }
                    for ($h = 0; $h < count($request->head_id); $h++) {
                        $credit = $head_paid[$h];
                        $decided = $head_decided[$h];
                        if ($credit > $decided) {
                            $pay_now_amouunt = $head_decided[$h];
                        } else {
                            $pay_now_amouunt = $head_paid[$h];
                        }
                        if ($pay_now_amouunt > 0) {
                            $head = new InvoiceHead();
                            $head->invoice_id = $invoices->id;
                            $head->campus_id = $campus->id;
                            $head->session_id = $campus->active_session;
                            $head->head_id = $request->head_id[$h];
                            $head->head_amount = $request->head_amount[$h];
                            $head->paid_amount = $pay_now_amouunt;
                            if ($paying_month == $feemonth) {
                                $head->mega_discount = $request->mega_discount[$h];
                            } else {
                                $head->mega_discount = 0;
                            }
                            $head->discount_amount = $request->discount_amount[$h];
                            $head->save();
                            $feePayment = $this->payFee($request->student_id, $fee_date, $pay_now_amouunt, $invoices->id);
                            $remaining = $head_paid[$h];
                            $head_paid[$h] = $remaining - $pay_now_amouunt;
                            $total_paying = $total_paying - $pay_now_amouunt;
                        } else {
                            if ($request->fee_type[$h] == 'Monthly') {
                                $invoiceoldhead = InvoiceHead::where('invoice_id', $invoices->id)->where('head_id', $request->head_id[$h])->first();
                                if ($invoiceoldhead) {
                                } else {
                                    $head = new InvoiceHead();
                                    $head->invoice_id = $invoices->id;
                                    $head->campus_id = $campus->id;
                                    $head->session_id = $campus->active_session;
                                    $head->head_id = $request->head_id[$h];
                                    $head->head_amount = $request->head_amount[$h];
                                    $head->paid_amount = $pay_now_amouunt;
                                    if ($paying_month == $feemonth) {
                                        $head->mega_discount = $request->mega_discount[$h];
                                    } else {
                                        $head->mega_discount = 0;
                                    }
                                    $head->discount_amount = $request->discount_amount[$h];
                                    $head->save();
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect()->route('paid-fees-index.index')->with('success', 'invoice has been created successfully.');
    }else{
        return redirect()->back()->with('error', 'Fee Not Decided For This Student!');  
    }
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoices)
    {
        $id = $_REQUEST['id'];
        $fee_month = $_REQUEST['feemonth'];
        $fee_year = $_REQUEST['feeyear'];
        $data = invoices::where('student_id', $id)
            ->whereYear('fee_date', $fee_year)
            ->whereMonth('fee_date', '=', $fee_month)
            ->with('invoice_heads')
            ->with(['invoice_heads' => function ($query) {
                $query->select('*')->with('feeHead');
            }])
            ->with(['student' => function ($query) {
                $query->select('*')->with(['invoices' => function ($query) {
                    $query->select('*')->with('invoice_heads');
                }]);
            }])
            ->with(['student' => function ($query) {
                $query->select('*')->with('father')->with('fee');
            }])
            ->first();
        //info($data->student->invoices[0]->invoice_heads);
        return view('modules.invoices.show', compact(['data']));
    }
    public static function studentInvoiceForParent($id, $fee_month, $fee_year)
    {
        $data = invoices::where('student_id', $id)
            ->whereYear('fee_date', $fee_year)
            ->whereMonth('fee_date', '=', $fee_month)
            ->with(['invoice_heads' => function ($query) {
                $query->select('*')->with('feeHead');
            }])
            ->with(['student' => function ($query) {
                $query->select('*')->with('father')->with('fee')->with(['invoices' => function ($query) {
                    $query->select('*')->with('invoice_heads');
                }]);
            }])
           
            ->first();
        info($data);
        return $data;
    }
    public static function paidFee($head, $id)
    {
        $data = invoices::where('student_id', $id)->get();
        $count = 0;
        $mega = 0;
        $total = array();
        foreach ($data as $invs) {
            $data_two = InvoiceHead::where('invoice_id', $invs->id)->where('head_id', $head)->get();
            foreach ($data_two as $heads) {
                $count += $heads->paid_amount;
                $mega += $heads->mega_discount;
                //info($heads);
            }
        }
        //info($count);
        //info('//////////////////////////////////////////////////////// End');
        $total["paid"] = $count;
        $total["mega_discount"] = $mega;
        return $total;
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
       
        if($request->invoice_id){
            $campus = $this->globalSettings();
            $heads = InvoiceHead::where('invoice_id',$request->invoice_id)->get();           
            $heads->each->delete();
            $paid = PaidFees::where('invoice_id',$request->invoice_id)->get();           
            $paid->each->delete();


            /////////////////////////////////////////
            for ($h = 0; $h < count($request->head_id); $h++) {
            $head = new InvoiceHead();
            $head->invoice_id = $request->invoice_id;
            $head->campus_id = $campus->id;
            $head->session_id = $campus->active_session;
            $head->head_id = $request->head_id[$h];
            $head->head_amount = $request->head_amount[$h];
            $head->paid_amount = $request->paid_amount[$h]-$request->mega_discount[$h];
            $pay_now_amouunt=$request->paid_amount[$h];
            $head->mega_discount = $request->mega_discount[$h];
            $head->discount_amount = $request->discount_amount[$h];
            $head->save();
            
           
            $feePayment = $this->payFee($request->student_id, $request->fee_date, $pay_now_amouunt, $request->invoice_id);
       
        }
        /////////////////////////////////////////
        $history = $this->newlog('invoice',$feePayment->id,'Update','Invoice Updated');
        return redirect()->route('invoices.index')->with('success', 'Invoice has been Updated successfully.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
  
     public function destroy($invoice){
        $invoices = invoices::find($invoice);           
        $invoices->delete();
        $heads = InvoiceHead::where('invoice_id',$invoice)->get();           
        $heads->each->delete();
        $paid = PaidFees::where('invoice_id',$invoice)->get();  
        $history = $this->newlog('invoice',$invoice,'Delete','Invoice Deleted');         
        $paid->each->delete();
        
        return response(['msg'=>'Deleted'], 200);     
    
    }


    public function payFee($student_id, $fee_date, $amount, $invoice_id)
    {
        $campus =$this->globalSettings();
        $PaidFees = new PaidFees();
        $PaidFees->campus_id = $campus->id;
        
        $PaidFees->student_id = $student_id;
        $PaidFees->fee_date = $fee_date;
        $PaidFees->pay_amount = $amount;
        $PaidFees->invoice_id = $invoice_id;
        $PaidFees->save();
        return $PaidFees;
    }
    public static function paidFeeCheck($month=null,$year=null,$id=null)
    {
       
       $data = Invoices::
         with('invoice_heads')
       ->where('student_id',$id)
       ->whereYear('fee_date', $year)
       ->whereMonth('fee_date', $month)
       ->first();
       return $data;
    }

    public function createInvoice($student_id, $fee_date)
    {
        $campus = $this->globalSettings();
        $invoices = new Invoices();
        $invoices->student_id = $student_id;
        $invoices->campus_id = $campus->id;
        $invoices->session_id = $campus->active_session;
        $invoices->invoice_id = $this->generateInvoiceId();
        $invoices->fee_date = $fee_date;
        $invoices->save();
        return $invoices;
    }
    public function generateInvoiceId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkInvoiceId($trackingid);
    }
    public function checkInvoiceId($trackingdid)
    {
        $verifytrackingid = invoices::where('invoice_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateInvoiceId();
        }
    }


    
    public function parentInvoice(Request $request)
    {
        $p_month = $request->month;
        $p_year = $request->year;
        $StudentParent = StudentParent::where('id', $request->parent_id)
            ->with('student')
            ->first();
        return view('modules.paid-fees.parent-invoice', compact(['StudentParent', 'p_month', 'p_year']));
    }

    public function parentallInvoices()
    {
        $campus =$this->globalSettings();
        $Parents = StudentParent::with('student')->where('campus_id',$campus->id)->get();
        return view('modules.paid-fees.parent_index', compact(['Parents']));
    }

    
    public function add_parent_invoice(Request $request)
    {
        $p_month = $request->month;
        $p_year = $request->year;
        $StudentParent = StudentParent::where('id', $request->parent_id)
        ->with(['student' => function ($query) {
            $query->select('*')->with(['fee' => function($q){
                $q->with('feeHead');

            }])->with(['invoices' => function ($query) {
                $query->select('*')->with('invoice_heads');
            }]);
        }])
         ->first();
        return view('modules.invoices.add_parent_invoice', compact(['StudentParent', 'p_month', 'p_year']));
    }

    



}
