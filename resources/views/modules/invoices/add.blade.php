@extends('layout.layout')
@section('content')
<div class="layout-px-spacing">
<div class="middle-content container-xxl p-0">
<div class="row layout-top-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
   <div class="row invoice layout-top-spacing layout-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="invoice-container">
                     <div class="invoice-inbox">
                        <div id="ct" class="">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                          <ul>
                          <li>{!! \Session::get('error') !!}</li>
                          </ul>
                          </div>
                        @endif
                           <form action="{{ route('invoices.store') }}" method="POST">
                              @csrf
                              <input type="hidden" name="student_id" value="{{$data->id}}" id="">
                              <input type="hidden" name="fee_date" value="{{$feedate}}" id="">
                              <div class="invoice-00001">
                                 <div class="content-section row">
                                    <div class="inv--head-section inv--detail-section">
                                       <div class="row">
                                       <div class="col-sm-6 col-6 mr-auto">
                                       <?php

                                             $global_Settings=App\Http\Controllers\CampusesController::activeCampus(Auth::user()->campus_id);
                                        ?>
                                                                        <div class="d-flex">
                                                                            <!-- <img class="company-logo" src="../src/assets/img/cork-logo.png" alt="company"> -->
                                                                            <h3 class="in-heading align-self-center">{{$global_Settings?->campus_name}}</h3>
                                                                        </div>
                                                                        
                                                                        <p class="inv-street-addr mt-3">{{$global_Settings?->campus_address}}</p>
                                                                       
                                                                        <p class="inv-email-address">{{$global_Settings?->campus_phone}}</p>
                                                                    </div>
                                          <div class="col-sm-6 col-6 text-end text-sm-end">
                                             <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span class="inv-title">Invoice : </span> <span class="inv-number">#0001</span></p>
                                             <p class="inv-email-address">Status:Paid</p>
                                             <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Mar 2022</span></p>
                                             <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Mar 2022</span></p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="inv--detail-section inv--customer-detail-section">
                                       <div class="row">
                                          <div class="col-6">
                                             <p class="inv-customer-name">Student Name: {{$data->student_name}}</p>
                                             <p class="inv-street-addr">Address: {{$data->address}}</p>
                                             <!-- <p class="inv-email-address">Phone : 00000000</p> -->
                                          </div>
                                          <div class="col-6 col-order-sm-0 order-1 text-end text-sm-end">
                                             <p class="inv-customer-name">Father Name :{{$data->father?->father_name}}</p>
                                             <p class="inv-street-addr">Address : {{$data->father?->father_office_address}}</p>
                                             <p class="inv-email-address">Phone : {{$data->father?->father_office_tel}}</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="inv--product-table-section">
                                       <div class="table-responsive">
                                          <table class="table">
                                             <thead class="">
                                                <tr>
                                                   <th scope="col">#</th>
                                                   <th scope="col">Fee Title</th>
                                                   <th scope="col">Fee Type</th>
                                                   <th class="text-end" scope="col">Amount</th>
                                                   <th class="text-end" scope="col">Decided amount</th>
                                                   <th class="text-end" scope="col">Balance</th>
                                                   <th  scope="col">New Amount</th>
                                                   <th  scope="col">Old Mega Discount</th>
                                                   <th  scope="col">New Mega Discount</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php $total=0;?>
                                                <?php $discount=0;?>
                                                @foreach($data->fee as $datas)
                                                <?php
                                                   $decided_amount=0;
                                                   $paid_amount=0;
                                                   $mega_discount=0;
                                                   $feesPaid=App\Http\Controllers\InvoicesController::paidFee($datas->feeHead->id,$data->id);
                                                   $paid_amount=$feesPaid['paid'];
                                                   $mega_discount=$feesPaid['mega_discount'];
                                                   foreach($data->invoices as $inv){
                                                       $decided_amount+=$datas->fee_amount;
                                                            
                                                   }
                                                    
                                                   ?>
                                                <?php
                                                   $amount_to_pay=0;
                                                   $balance=0;
                                                   if($datas->feeHead->fee_type=='Monthly'){
                                                      $balance=$decided_amount-$paid_amount-$mega_discount;
                                                      $amount_to_pay=$datas->fee_amount+$balance;
                                                                                                                           
                                                   }else if($datas->feeHead->fee_type=='Once'){
                                                      if($paid_amount<$datas->fee_amount && $paid_amount>0){
                                                         $amount_to_pay=$datas->fee_amount-$paid_amount-$mega_discount;
                                                         $balance=$datas->fee_amount-$paid_amount;
                                                       }else{
                                                        $amount_to_pay=$datas->fee_amount-$paid_amount;
                                                        
                                                       } 
                                                                                                                           
                                                   }else if($datas->feeHead->fee_type=='Quarterly'){
                                                      if($paid_amount<$datas->fee_amount && $paid_amount>0){
                                                         $amount_to_pay=$datas->fee_amount-$paid_amount-$mega_discount;
                                                         $balance=$datas->fee_amount-$paid_amount;
                                                       }else{
                                                        $amount_to_pay=$datas->fee_amount-$paid_amount;
                                                        
                                                       } 
                                                                                                                           
                                                   }else if($datas->feeHead->fee_type=='Annual'){                                                                                  
                                                        if($paid_amount<$datas->fee_amount && $paid_amount>0){
                                                           $amount_to_pay=$datas->fee_amount-$paid_amount-$mega_discount;
                                                           $balance=$datas->fee_amount-$paid_amount;
                                                         }else{
                                                          $amount_to_pay=$datas->fee_amount-$paid_amount;
                                                          
                                                         }     
                                                   }
                                                   $total+=$amount_to_pay;
                                                   $discount+=$datas->fee_discount;
                                                   ?>
                                                <?php 
                                                   if($datas->feeHead->fee_type=='Annual'){                                                                                  
                                                      if($paid_amount>=$datas->fee_amount){
                                                       
                                                      }else{
                                                       ?>
                                                <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td>{{$datas->feeHead?->fee_head}}</td>
                                                   <td>{{$datas->feeHead?->fee_type}}</td>
                                                   <input type="hidden" name="fee_type[]" value="{{$datas->feeHead?->fee_type}}">
                                                   <input type="hidden" name="head_id[]" value="{{$datas->feeHead?->id}}">
                                                   <input type="hidden" name="fee_head[]" value="{{$datas->fee_head}}">
                                                   <td class="text-end">{{$datas->feeHead?->head_amount}}</td>
                                                   <input type="hidden" name="head_amount[]" value="{{$datas->feeHead?->head_amount}}">
                                                   <td class="text-end"><span class="decided_amount">{{$datas->fee_amount}}</span></td>
                                                   <input type="hidden" name="decided_amount[]" value="{{$datas->fee_amount}}">

                                                   
                                                   <td class="text-end">
                                                      <?php
                                                         echo $balance;
                                                             
                                                         ?>
                                                   </td>



                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="{{$amount_to_pay}}" type="number"  class="form-control paid_amount" value="{{$amount_to_pay}}" name="paid_amount[]" id="paid_amount_{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <td>{{$mega_discount}}</td>
                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="0" type="number"  class="form-control mega_discount" value="0" name="mega_discount[]" id="special_discount{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <input type="hidden" class="form-control" value="{{$datas->fee_discount}}" name="discount_amount[]" id="">
                                                </tr>
                                                <?php
                                                   }     
                                                   }else if($datas->feeHead->fee_type=='Quarterly'){                                                                                  
                                                      if($paid_amount>=$datas->fee_amount){
                                                       
                                                      }else{
                                                       ?>
                                                <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td>{{$datas->feeHead?->fee_head}}</td>
                                                   <td>{{$datas->feeHead?->fee_type}}</td>
                                                   <input type="hidden" name="fee_type[]" value="{{$datas->feeHead?->fee_type}}">
                                                   <input type="hidden" name="head_id[]" value="{{$datas->feeHead?->id}}">
                                                   <input type="hidden" name="fee_head[]" value="{{$datas->fee_head}}">
                                                   <td class="text-end">{{$datas->feeHead?->head_amount}}</td>
                                                   <input type="hidden" name="head_amount[]" value="{{$datas->feeHead?->head_amount}}">
                                                   <td class="text-end"><span class="decided_amount">{{$datas->fee_amount}}</span></td>
                                                   <input type="hidden" name="decided_amount[]" value="{{$datas->fee_amount}}">

                                                   
                                                   <td class="text-end">
                                                      <?php
                                                         echo $balance;
                                                             
                                                         ?>
                                                   </td>



                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="{{$amount_to_pay}}" type="number"  class="form-control paid_amount" value="{{$amount_to_pay}}" name="paid_amount[]" id="paid_amount_{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <td>{{$mega_discount}}</td>
                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="0" type="number"  class="form-control mega_discount" value="0" name="mega_discount[]" id="special_discount{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <input type="hidden" class="form-control" value="{{$datas->fee_discount}}" name="discount_amount[]" id="">
                                                </tr>
                                                <?php
                                                   }     
                                                   }else if($datas->feeHead->fee_type=='Once'){                                                                                  
                                                      if($paid_amount>=$datas->fee_amount){
                                                       
                                                      }else{
                                                       ?>
                                                <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td>{{$datas->feeHead?->fee_head}}</td>
                                                   <td>{{$datas->feeHead?->fee_type}}</td>
                                                   <input type="hidden" name="fee_type[]" value="{{$datas->feeHead?->fee_type}}">
                                                   <input type="hidden" name="head_id[]" value="{{$datas->feeHead?->id}}">
                                                   <input type="hidden" name="fee_head[]" value="{{$datas->fee_head}}">
                                                   <td class="text-end">{{$datas->feeHead?->head_amount}}</td>
                                                   <input type="hidden" name="head_amount[]" value="{{$datas->feeHead?->head_amount}}">
                                                   <td class="text-end"><span class="decided_amount">{{$datas->fee_amount}}</span></td>
                                                   <input type="hidden" name="decided_amount[]" value="{{$datas->fee_amount}}">

                                                   
                                                   <td class="text-end">
                                                      <?php
                                                         echo $balance;
                                                             
                                                         ?>
                                                   </td>



                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="{{$amount_to_pay}}" type="number"  class="form-control paid_amount" value="{{$amount_to_pay}}" name="paid_amount[]" id="paid_amount_{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <td>{{$mega_discount}}</td>
                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="0" type="number"  class="form-control mega_discount" value="0" name="mega_discount[]" id="special_discount{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <input type="hidden" class="form-control" value="{{$datas->fee_discount}}" name="discount_amount[]" id="">
                                                </tr>
                                                <?php
                                                   }     
                                                   }else{
                                                    ?>
                                                <tr>
                                                   <td>{{$loop->iteration}}</td>
                                                   <td>{{$datas->feeHead?->fee_head}}</td>
                                                   <td>{{$datas->feeHead?->fee_type}}</td>
                                                   <input type="hidden" name="fee_type[]" value="{{$datas->feeHead?->fee_type}}">
                                                   <input type="hidden" name="head_id[]" value="{{$datas->feeHead?->id}}">
                                                   <input type="hidden" name="fee_head[]" value="{{$datas->fee_head}}">
                                                   <td class="text-end">{{$datas->feeHead?->head_amount}}</td>
                                                   <input type="hidden" name="head_amount[]" value="{{$datas->feeHead?->head_amount}}">
                                                   <td class="text-end"><span class="decided_amount">{{$datas->fee_amount}}</span></td>
                                                   <input type="hidden" name="decided_amount[]" value="{{$datas->fee_amount}}">
                                                   <td class="text-end">
                                                      <?php
                                                         echo $balance;
                                                             
                                                         ?>
                                                   </td>
                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="{{$amount_to_pay}}" type="number"  class="form-control paid_amount" value="{{$amount_to_pay}}" name="paid_amount[]" id="paid_amount_{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <td>{{$mega_discount}}</td>
                                                   <td class="text-end">
                                                      <input onkeyup="myFunction({{$datas->feeHead?->id}})" min="0" data-id="0" type="number"  class="form-control mega_discount" value="0" name="mega_discount[]" id="special_discount{{$datas->feeHead?->id}}">
                                                   </td>
                                                   <input type="hidden" class="form-control" value="{{$datas->fee_discount}}" name="discount_amount[]" id="">
                                                </tr>
                                                <?php
                                                   }
                                                   ?>
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    
                                    <div class="inv--total-amounts">
                                       <div class="row mt-4">
                                          <div class="col-sm-5 col-5 order-sm-0 order-1">
                                          </div>
                                          <div class="col-sm-7 col-7 order-sm-1 order-0">
                                             <div class="text-sm-end">
                                                <div class="row">
                                                  
                                                   <div class="col-sm-8 col-7">
                                                      <p class=" discount-rate">Mega Discount:</p>
                                                   </div>
                                                   <div class="col-sm-4 col-5">
                                                      <p class="">Rs. <span id="megadiscount">0</span></p>
                                                   </div>
                                                  
                                                   <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                      <h4 class="">Grand Total : </h4>
                                                   </div>
                                                   <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                      <h4 class="" id="">Rs. <span id="grand_total_a">{{$total}}</span></h4>
                                                      <input type="hidden" value="{{$total}}" data-id="{{$total}}" name="total_amount" id="grand_total_b">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>


                                    
                                    <div class="row mt-5 no-print" style="margin-bottom: 1em">
                                       <div class="col-6 text-left"><button type="button" class="btn btn-warning" onclick="window.print()">Print</button></div>
                                       <div class="col-6 text-end"><input type="submit" value="Pay Now" class="btn btn-primary">
                                       </div>
                                    </div>
                                   
                                 </div>
                              </div>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection