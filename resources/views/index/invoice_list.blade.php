                           
                            
                           
                            <style>
    .list-table-scroll{
    max-height: 300px;
    min-height: 300px;
    padding:20px;
    margin-bottom: 10px;
    overflow:scroll;
    -webkit-overflow-scrolling: touch;
}
 </style>
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-table-two">
    
                                <div class="widget-heading">
                                    <h5 class="">Recent Invoices</h5>
                                </div>
    
                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th><div class="th-content">Student</div></th>
                                                    <th><div class="th-content">Class</div></th>
                                                    <th><div class="th-content">Invoice</div></th>
                                                    <th><div class="th-content th-heading">Price</div></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                 
                                 
                                 $allinvoices=App\Http\Controllers\InvoicesController::all_invoices_limit();
                                 foreach($allinvoices as $inv){
                                    $total=0;
                                    
                                        foreach($inv->Invoice_heads as $ih){
                                            $total+=$ih->paid_amount;
    
                                      }
                                   ?>
                                                <tr>
                                                    <td><div class="td-contentproduct-brand text-primary">{{$inv->student?->student_name}}</td>
                                                    <td><div class="td-content product-brand ">{{$inv->student?->class?->class_name}}</div></td>
                                                    <td><div class="td-content product-invoice">#{{$inv->invoice_id}}</div></td>
                                                    <td><div class="td-content pricing"><span class="">Rs: {{$total}}</span></div></td>
                                                    
                                                </tr>

                                 <?php
                                   
                                }
                                
                                 ?>
                                                
                                                
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                    <a href="/invoices" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        <span class="btn-text-inner">View</span>
                                       </a>
                                    
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>