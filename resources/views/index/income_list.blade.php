 <style>
    .list-group-scroll{
    max-height: 200px;
    min-height: 200px;
    padding:20px;
    margin-bottom: 10px;
    overflow:scroll;
    -webkit-overflow-scrolling: touch;
}
 </style>                                 
                                 <?php
                                  $total=0;
                                  $feeheads=App\Http\Controllers\FeeHeadController::all_feeheads();
                                  $allinvoices=App\Http\Controllers\InvoicesController::all_invoices();
                                  foreach($allinvoices as $inv){
                                    foreach($inv->Invoice_heads as $ih){
                                        $total+=$ih->paid_amount;

                                  }
                                 }
                                 
                                  ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    
                            <div class="widget widget-wallet-one border border-warning">

                                <div class="wallet-info text-center mb-3">

                                   
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                                <p class="wallet-title mb-3">Total Income</p>
                                            </div>
                                    
                                    <p class="total-amount mb-3">Rs: {{$total}}</p>
    

                                </div>
    

                                <div class="wallet-action text-center d-flex justify-content-around">
                                       
                                <form action="/paid-fees" method="Post">
                        @csrf
                                    <a href="javascript:{}" onclick="this.closest('form').submit();" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        <span class="btn-text-inner">Add</span>
                                    </a>
                       
                    </form>
                                    
                                            
                                    
                                    <form action="/reports" method="Post">
                                     @csrf
                                      <a href="javascript:{}" class="btn btn-success" onclick="this.closest('form').submit();">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        <span class="btn-text-inner">View</span>
                                      
                                     </a>
                                    </form>
                                    
                                </div>

                                <hr>
                                <ul class="list-group list-group-media list-group-scroll">
                                    <?php
                                       
                                    foreach($feeheads as $fh){
                                        

                                        $total_head=0;
                                        foreach($fh->Invoice_heads as $ih){
                                            $total_head+=$ih->paid_amount;

                                        }
                                        
                                        ?>
                                        <li class="list-group-item shadow m-2" style="border-radius:25px;">
                                        <div class="media">
                                            <div class="w-icon m-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                                
                                            </div>
                                            <div class="media-body m-3">
                                                <h6 class="tx-inverse"> {{$fh->fee_head}}</h6>
                                                <p class="mg-b-0">{{$fh->fee_type}}</p>
                                                <h4 class="amount p-3">
                                                    Rs : {{$total_head}}
                                                
                                    </h4>
                                            </div>
                                        </div>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                    
                                    
                                </ul>

                                
                                
                            </div>
                        </div>
                        
                        

                        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-12 layout-spacing">
    
                            <div class="widget widget-wallet-one border border-info">

                                <div class="wallet-info text-center mb-3">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                                <p class="wallet-title mb-3">Total Expenses</p>
                                            </div>

                                   
                                    
                                    <p class="total-amount mb-3">Rs: 0</p>
    

                                </div>
    

                                <div class="wallet-action text-center d-flex justify-content-around">
                                            
                                    <button class="btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        <span class="btn-text-inner">Add</span>
                                    </button>

                                            
                                    <button class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        <span class="btn-text-inner">View</span>
                                    </button>

                                    
                                </div>

                                <hr>
                                <ul class="list-group list-group-media list-group-scroll">
                                    
                                </ul>

                                
                                
                            </div>
                        </div>
                        
                        
                        
                        

                        
                        
