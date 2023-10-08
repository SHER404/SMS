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
                                          <div class="d-flex">
                                             <!-- <img class="company-logo" src="../src/assets/img/cork-logo.png" alt="company"> -->
                                             <h3 class="in-heading align-self-center">Rills SMS</h3>
                                          </div>
                                          <p class="inv-street-addr mt-3">Iqbal town , Lahore</p>
                                          <p class="inv-email-address">rills@company.com</p>
                                          <p class="inv-email-address">(120) 456 789</p>
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
                                          <p class="inv-customer-name"></p>
                                          <p class="inv-street-addr"></p>
                                          <p class="inv-email-address"></p>
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
                                       
                                    <?php $total=0;?>
                                          <?php $discount=0;?>
                                    @foreach($StudentParent->student as $student)
                                     
                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                       <p class="inv-customer-name mt-5" style="margin-bottom: 1em">Student Name: {{$student?->student_name}} </p>
                                       </div>
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

                                          @if($student->fee)
                                           @foreach($student->fee as $fee)

                                          <?php 
                                           $feesPaid=App\Http\Controllers\InvoicesController::paidFee($fee->feeHead->id,$student->id);
                                           $paid_amount=$feesPaid['paid'];
                                           $mega_discount=$feesPaid['mega_discount'];
                                           //$total+=$fee?->fee_amount;


                                           //$discount+=$fee?->discount_amount;?>

                                           <?php
                                                   $amount_to_pay=0;
                                                   $balance=0;
                                                   $decided_amount=0;
                                                   foreach($student->invoices as $inv){
                                                      $decided_amount+=$fee->fee_amount;
                                                           
                                                  }
                                                   if($fee->feeHead->fee_type=='Monthly'){
                                                      $balance=$decided_amount-$paid_amount-$mega_discount;
                                                      $amount_to_pay=$fee->fee_amount+$balance;
                                                                                                                           
                                                   }else if($fee->feeHead->fee_type=='Annual'){                                                                                  
                                                        if($paid_amount<$fee->fee_amount && $paid_amount>0){
                                                           $amount_to_pay=$fee->fee_amount-$paid_amount-$mega_discount;
                                                           $balance=$fee->fee_amount-$paid_amount;
                                                         }else{
                                                          $amount_to_pay=$fee->fee_amount-$paid_amount;
                                                          
                                                         }     
                                                   }
                                                   $total+=$amount_to_pay;
                                                   $discount+=$fee->fee_discount;
                                                   ?>

                                             <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$fee?->fee_head}}</td>
                                                <td>{{$fee?->feeHead?->fee_type}}</td>
                                                <td class="text-end">{{$fee?->actual_amount}}</td>
                                                <td class="text-end">{{$fee?->fee_amount}}</td>
                                                <td class="text-end">{{$balance}}</td>
                                                <td class="text-end">
                                                   <input type="number" class="form-control" name="" value="{{$amount_to_pay}}" id="">
                                                   
                                                </td>
                                                <td class="text-end">{{$mega_discount}}</td>
                                                <td class="text-end"><input type="number" class="form-control" name="" value="0" id=""></td>
                                             </tr>
                                             <tr>
                                                
                                             </tr>
                                             @endforeach
                                          @endif
                                          </tbody>
                                       </table>
                                       @endforeach

                                    </div>
                                 </div>



                                 

                               
                                 <div class="inv--total-amounts">
                                       <div class="row mt-4">
                                          <div class="col-sm-5 col-12 order-sm-0 order-1">
                                          </div>
                                          <div class="col-sm-7 col-12 order-sm-1 order-0">
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


                                    
                                    <div class="row mt-5" style="margin-bottom: 1em">
                                       <div class="col-6 text-left"></div>
                                       <div class="col-6 text-end"><input type="submit" value="Pay Now" class="btn btn-primary">
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