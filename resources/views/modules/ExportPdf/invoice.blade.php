<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <!-- <style>
        .card-invoice {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
            background-color: #fff;
            margin-top: 20px;
        }
        .card-invoice-header {
            border-bottom: 1px solid rgba(0,0,0,0.125);
         
        }

        #border-box{
          margin-top: 13rem;
        }
       
    </style> -->
</head>
<body>
<?php $copies=['Student','School','Bank'];
      
?>
@foreach($data as $datas)
           

             <!-- Student 1 -->
    <div class="container">
        <div class="row justify-content-center">
          <div class="row">
           @foreach($copies as $c)
            <div class="col-4">
              <div class="card card-invoice">
                  <div class="card-invoice-header">
                    <img src="assets/images/Header.PNG" alt="Header Image" width="100%" height="140px">
                  </div>
                  <table style="font-size: 14px;" class="table m-2 p-2">
                    <tr><td>Registration ID: {{$datas->Registration_id}}</td> <td>Challan #: {{$datas->Registration_id}}</td></tr>
                    <tr><td colspan="2">Student Name: {{$datas->student_name}}</td></tr>
                    <tr><td colspan="2">Father Name:  {{$datas->father?->father_name}}</td></tr>
                    <tr><td colspan="2">Class: {{$datas->class?->class_name}}</td></tr>
                    
                  </table>
                  <table style="font-size: 12px;border:1px solid black;text-align:center;" class="tabel table-bordered m-2 p-2">
                    <tr><td>Issue Date: <?php echo $date?></td> <td>Due Date: <?php echo $date?></td></tr>
                    <tr><td>Description</td> <td>Amount</td></tr>
                          <?php 
                          $total_fee=0;
                          $total_paid=0;
                          $year=date('Y',strtotime($date));
                          $month=date('m',strtotime($date));
                          $fees=App\Http\Controllers\PaidFeesController::paidFee($month,$year,$datas->id);
                          foreach($fees as $f){
                            $total_paid+=$f->pay_amount;
                          }
                          
                          ?>
                          
                          @if($datas->fee)
                          @foreach($datas->fee as $fee)
                             <?php  
                             $total_fee+=(int)$fee->fee_amount;
                            
                             
                             ?>
                          @endforeach
                          @endif

                          <?php
                          $total_amount=$total_fee-$total_paid;
                          ?>
                    <tr><td colspan="2" style="height:100px;"></td></tr>
                    <tr><td>Amount Pay(RS) With in Due Date</td> <td>{{$total_amount}}</td></tr>
                    <tr><td>Amount Pay(RS) Afer Due Date</td> <td>{{$total_amount}}</td></tr>
                   
                  </table>
                  
           

            <div class="col-12 mt-1 ms-3">
              <h6 class="text-start">Eight Thousand Only</h6>
              </div>
            <div class="col-12 mt-1">
              <h6 class="text-center">{{$c}} Copy</h6>
              </div>

            <div class="container-box">
              <div class="border border-dark mt-1 me-2 ms-2">
              <div class="col-12 mx-2">
                  <p class="text-start">Received By :</p>
                </div>

                <div class="row">
                  <div class="col">
                    <h6 class="border-top">Name</h6>
                  </div>
                  <div class="col">
                    <h6 class="text-center border-top ">Sign</h6>
                  </div>
                  <div class="col">
                    <h6 class="text-center border-top  ">Stamp</h6>
                  </div>
                  <div class="col">
                    <h6 class="text-center border-top  ">Director</h6>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="row">
              <div class="col-6 mt-3">
                <h6 class="text-center ms-3 text-white" style="background-color: grey;">Main Office</h6>
                </div>
                <div class="col-6 mt-3">
                  <h6 class="text-center me-2 text-white" style="background-color: grey;">Head office</h6>
                  </div>
            </div>

            <div class="row">
              <div class="col-6 mt-1">
                <h6 class="text-center ms-3 text-black">Canal Road opposite KFC Building no#4 Lahore,Pakistan</h6>
                </div>
                <div class="col-6 mt-1">
                <h6 class="text-center ms-3 text-black">Canal Road opposite KFC Building no#4 Lahore,Pakistan</h6>
                  
                
                  </div>
            </div>

            

            <div class="row">
              
            </div>
            

          </div>





    </div>
        @endforeach
       
          </div>  
        </div>
    </div>



      <!-- Student 1 -->
      @endforeach
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
