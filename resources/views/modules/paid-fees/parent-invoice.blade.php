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
                           <div class="invoice-00001">
                              <div class="content-section">
                                 <div class="inv--head-section inv--detail-section">
                                    <div class="row">
                                    <div class="col-sm-6 col-12 mr-auto">
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
                                       <div class="col-sm-6 text-sm-end">
                                          <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span class="inv-title">Invoice : </span> <span class="inv-number"></span></p>
                                          <p class="inv-email-address">Status:Partial</p>
                                          <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Invoice Date : </span> <span class="inv-date"></span></p>
                                          <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date"></span></p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="inv--detail-section inv--customer-detail-section">
                                    <div class="row">
                                       <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                          <p class="inv-to"></p>
                                       </div>
                                       <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                          <h6 class=" inv-title"></h6>
                                       </div>
                                       <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                          <p class="inv-customer-name">Student Name:{{$StudentParent->student[0]?->student_name}} </p>
                                          <p class="inv-street-addr">Address:  </p>
                                          <p class="inv-email-address">Phone : </p>
                                       </div>
                                       <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                          <p class="inv-customer-name">Father Name : {{$StudentParent->father_name}} </p>
                                          <p class="inv-street-addr">Address : </p>
                                          <p class="inv-email-address">Phone : </p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="inv--product-table-section">
                                    <div class="table-responsive">
                                       <table class="table">
                                          <thead class="">
                                             <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Student Name </th>
                                                <th scope="col">Fee Title</th>
                                                <th scope="col">Fee Type</th>
                                                <th class="text-end" scope="col">Amount</th>
                                                <th class="text-end" scope="col">Decided amount</th>
                                                <th class="text-end" scope="col">Paid Amount</th>
                                                <th class="text-end" scope="col">Balance</th>
                                                <th class="text-end" scope="col">Mega discount</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                $grand_total=0;
                                                $paid_amount=0;
                                                $mega_discount=0;
                                                $balance=0;
                                                  ?>
                                             @foreach($StudentParent->student as $student)
                                             <?php
                                                $fees=App\Http\Controllers\InvoicesController::studentInvoiceForParent($student->id,$p_month,$p_year);
                                                ?>
                                             @if($fees)
                                             @foreach($fees->invoice_heads as $datas)
                                             <?php
                                                $grand_total+=$datas->head_amount-$datas->discount_amount;
                                                $paid_amount+=$datas->paid_amount;
                                                $mega_discount+=$datas->mega_discount;
                                                ?>
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->student_name}}</td>
                                                <td>{{$datas->feeHead->fee_head}}</td>
                                                <td>{{$datas->feeHead->fee_type}}</td>
                                                <td class="text-end">{{$datas->feeHead->head_amount}}</td>
                                                <td class="text-end">{{$datas->head_amount-$datas->discount_amount}}</td>
                                                <td class="text-end">{{$datas->paid_amount}}</td>
                                                <td class="text-end">{{$datas->head_amount-$datas->discount_amount-$datas->paid_amount}}</td>
                                                <td  class="text-end">{{$datas->mega_discount}}</td>
                                             </tr>
                                             @endforeach
                                             @endif
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="inv--total-amounts">
                                    <div class="row mt-4">
                                       <div class="col-sm-5 col-12 order-sm-0 order-1">
                                       </div>
                                       <div class="col-sm-7 col-12 order-sm-1 order-0">
                                          <div class="text-sm-end">
                                             <div class="row">
                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                   <h4 class=""> Grand Total :   </h4>
                                                </div>
                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                   <h4 class="">Rs.   {{$grand_total}}  </h4>
                                                   <input type="hidden" name="total_amount" id="">
                                                </div>
                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                   <h4 class="">Paid Amount :  
                                                   </h4>
                                                </div>
                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                   <h4 class="">Rs.  {{$paid_amount}}</h4>
                                                   <input type="hidden" name="total_amount" id="">
                                                </div>
                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                   <h4 class="">Balance :  </h4>
                                                </div>
                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                   <h4 class="">Rs. {{$grand_total-$paid_amount-$mega_discount}}    </h4>
                                                   <input type="hidden" name="total_amount" id="">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection