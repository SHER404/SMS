<?php
namespace App\Http\Controllers;
use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Family;
use App\Models\FeeHead;
use App\Models\InvoiceHead;
use App\Models\StudentsFee;
use App\Models\EmergencyPhone;
use Illuminate\Support\Facades\Auth;
use App\Models\Campuses;

use DB;
class ReportController extends Controller
{
public function index(Request $request)
{    
            $campus_id=Auth::user()->campus_id;
            $campus = campuses::find($campus_id);
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
            
            

            foreach($data as $d){
       
                info($d->Invoice_heads);
                
            }
       
            if($request->id){
                $data = Invoices::all();
                    return view('modules.invoices.single_invoice',compact(['data']));
            }

          

            




return view('modules.report.index',compact(['data','students','families','Head']));
}
public function reportsDefaulters(Request $request)
{    
            $campus_id=Auth::user()->campus_id;
            $campus = campuses::find($campus_id);
            $students= Students::with('class')->where('campus_id',$campus->id)->where('academic_session_id',$campus->active_session)->get();
            $cMonth=date('m');
            if($request->month){
                $month=$request->month;
                $thisyear=date('Y',strtotime($request->month));
                $thisMonth=date('m',strtotime($request->month));
            }else{
                $month=date('Y-m-d');
                $thisyear=date('Y');
                $thisMonth=date('m');
            }
            $thisDay=date('d');
            if($campus->fee_deadline){
                $deadline=$campus->fee_deadline;
            }else{
                $deadline=10;
            }
            
            $data=[];
            foreach($students as $student){
                 ////////////////////////////////// Find Tuition Fee Head
                 //dd($student->id);
                 $search = 'Tuition Fee';
                 $TFee= StudentsFee::where('student_id',$student->id)->where('fee_head', 'LIKE', '%'.$search.'%')->first();
                 ////////////////////////////////// Find Tuition Fee Head End
                /////////////////////////////  Find Invoice
                $query= Invoices::where('campus_id',$campus->id)->where('session_id',$campus->active_session)->where('student_id',$student->id)
                ->whereYear('fee_date', $thisyear)->whereMonth('fee_date', $thisMonth)->first();
                //////////////////////////////// Find Invoice
                if($TFee!=null){
                if($query!=null){
                     /////////////////////////////// Check Tuition  Fee
                      
                    $CheckTFee= InvoiceHead::where('invoice_id',$query->id)->where('head_id', $TFee->fee_head_id)->first();
                        
                    if($CheckTFee!=null){
                      if($CheckTFee->paid_amount<=0){
                        $balance=$CheckTFee->head_amount-$CheckTFee->discount_amount;
                        
                        if($balance>0){
                          if($deadline<$thisDay && $thisMonth<=$cMonth){
                            $data[]=$student;
                          }
                        }
                      }
                    }else{
                        if($deadline<$thisDay && $thisMonth<=$cMonth){
                            $data[]=$student;
                        }

                    }
                   
                     /////////////////////////////// Check Tuition  Fee End
                     
                }else{
                   
                    if($deadline<$thisDay && $thisMonth<=$cMonth){
                        $data[]=$student;
                    }
                   
                }
               }

            }
            
            

          return view('modules.report.index-defaulter',compact(['data','students','month']));
}
public static function reportsDefaultersCount()
{    
            $campus_id=Auth::user()->campus_id;
            $campus = campuses::find($campus_id);
            $students= Students::with('class')->where('campus_id',$campus->id)->where('academic_session_id',$campus->active_session)->get();
            $cMonth=date('m');
            $thisyear=date('Y');
            $thisMonth=date('m');
            $thisDay=date('d');
            if($campus->fee_deadline){
                $deadline=$campus->fee_deadline;
            }else{
                $deadline=10;
            }
            
            $data=0;
            foreach($students as $student){
                $query= Invoices::
                where('campus_id',$campus->id)->where('session_id',$campus->active_session)->where('student_id',$student->id)->whereYear('fee_date', $thisyear)->whereMonth('fee_date', $thisMonth)->first();
                if($query!=null){     
                }else{
                    info($deadline);
                    info($thisDay);
                    if($deadline<$thisDay && $thisMonth<=$cMonth){
                        $data++;
                    }  
                }
            }
            
          return $data;
}

public function show_invoice(Request $request){

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
                     return view('modules.invoices.single_invoice',compact(['invoice']));



}


}