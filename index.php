<?php 
    include 'header.php';
 ?>	
 
  <script type="text/javascript">
    var all=true;
    $(document).ready(function () {
      var $obj = $('#menu');
    var $obj2 = $('#pnl');
    var $obj3 = $('#nbar');

    var top = $obj.offset().top - parseFloat($obj3.css('marginTop').replace(/auto/, 0));

    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

    if(all)
    {
      
      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
        $obj.addClass('fixed');
        $obj3.addClass('nfixed');
        $obj3.addClass('animated fadeInDown');
        $obj.addClass('animated fadeInLeft');
        // $obj2.addClass('animated fadeIn');
        $obj2.addClass('col-md-offset-2');
        once=true;
      } else {
        // otherwise remove it
        $obj.removeClass('fixed');
        $obj.removeClass('animated fadeInLeft');
        $obj2.removeClass('col-md-offset-2');
        $obj3.removeClass('nfixed');
        $obj3.removeClass('animated fadeInDown');
  
      } 
    }
    });
  });
    
  </script>
	<div class="container-fluid" id="sidebar">
        <div class="row" >
            <div class="col-md-2" id="menu" style="" >
                <ul class="nav nav-pills nav-stacked text-center animated fadeIn">
                    <li class="active">
                        <a href="#"><i class="fa fa-history"></i> Ledger</a>
                    </li>
                    <li><a href="index.php" style="color:#ff6e05;"><i class="fa fa-shopping-cart"></i> Sales</a></li>
                    <li><a href="purchases.php"><i class="fa fa-cart-arrow-down"></i> Purchases</a></li>
                    <br><br>
                    <li class="active" >
                        <a href="#" >
                            <i class="fa fa-user-circle"> Accounts</i>
                        </a>
                      </li>
                    <li>
                        <a href="customer.php"><i class="fa fa-user"></i> Customer</a>
                    </li>
                    <li>
                        <a href="supplier.php"><i class="fa fa-user"></i> Supplier</a>
                    </li>
                    <li>
                        <a href="employer.php"><i class="fa fa-user"></i> Employers</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 " id="pnl" style="">
                <div class="panel panel-success animated fadeIn">
                    <div class="panel-body" style="">
                        <p class="text-center text-Success" style="font-size:30px;color:green;"><i class="fa fa-cart-arrow-down"></i> Sale Ledger 
                        <input type="date" name="date" id="date" class="form-control pull-right" style="width:200px;" placeholder="Select Date" >
                        </p>
                        <div id="data" style="background-color: rgba(216,210,139,0.5);">
                           <div class="table-responsive">

                                <!-- <?php
                                $s=0;

                                $query=mysqli_query($con,"SELECT * FROM sale ORDER BY id DESC LIMIT ".$s.", ".$s."");
                                if(mysqli_num_rows($query)>0)
                                {

                                    echo "<table class='table  '>
                                   <thead>
                                           ";
                                           $current;
                                           $previous;
                                           $p=1;
                                           $pro=1;
                                           $sr=1;
                                           $id;
                                    $date;
                                    $detail;
                                    $name;
                                    $quantity;
                                    $price;
                                    $total;
                                    $payment;
                                    $remaining;
                                    $current;
                                    $prem;
                                    $ppay;
                                    $ptotal;
                                    $gold;
                                   while($row=mysqli_fetch_array($query))
                                   {
                                        $id=$row['order_id'];
                                        // echo "Id :".$id;
                                        $date=$row['date'];
                                        $detail=$row['detail'];
                                        $name=$row['name'];
                                        $quantity=$row['quantity'];
                                        $price=$row['price'];
                                        $total=$row['total'];
                                        $payment=$row['payment'];
                                        $remaining=$row['remaining'];
                                        $current=$id;
                                        if($p==1)
                                        {
                                           $current=$id;
                                           $previous=$id;
                                           $p=0;
                                        }
                                        if($pro==1)
                                        {
                                          echo " <tr>
                                            <td style='border:none;font-size: 15px;'><b> Name :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$name."</td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;float: right;font-size: 15px;'><b>Date :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$date."</td>
                                            </tr>
                                            <tr>
                                                <td style='border:none;font-size: 15px;'><b>Order ID :</b></td>
                                                <td style='border: none;font-size: 15px;'>".$id."</td>
                                                <td style='border:none;'></td>
                                                <td style='border: none;'></td>
                                                <td style='border:none;'></td>

                                            </tr>
                                        </thead>
                                        <thead>
                                          <tr  style='background-color:#830dbf;color:white'>
                                            <th>Sr</th>
                                            <th>Detail</th>
                                            <th>Quantity</th>
                                            <th>Price/unit</th>
                                            <th>Total</th>
                                          </tr>
                                          </thead>
                                        <tbody>
                                            <tr>
                                                <td>".$sr."</td>
                                                <td>".$detail."</td>
                                                <td>".$quantity."</td>
                                                <td>".$price."</td>
                                                <td>".$quantity*$price."</td>
                                            </tr>
                                        
                                          ";
                                        $gold=$id;   
                                          $prem=$remaining;
                                          $ptotal=$total;
                                          $ppay=$payment;
                                          $sr++;
                                        $pro=2;
                                        continue;
                                        }
                                        if($current==$previous )
                                        {
                                           echo "
                                                
                                                <tr>
                                                    <td>".$sr."</td>
                                                    <td>".$detail."</td>
                                                    <td>".$quantity."</td>
                                                    <td>".$price."</td>
                                                    <td>".$quantity*$price."</td>
                                                </tr>
                                                  ";

                                          $prem=$remaining;
                                          $ptotal=$total;
                                          $ppay=$payment;
                                          $sr++;
                                        }
                                        else
                                        {
                                            echo "<tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;font-size: 15px;' colspan='2' >Total</td>
                                            <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$ptotal."</td>
                                        </tr>
                                        <tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Payment</td>
                                            <td style=border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp; ".$ppay."</td>
                                        </tr >
                                        <tr >
                                            <td style='border:none;'>
                                             <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-lg btn-primary' >Print</a>
                                             <button id='dlt' val=".$gold." type='button' class='btn btn-lg btn-danger'>Delete</a>
                                            </td>
                                            <td style='border:none;'></td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
                                            <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
                                                </tr>
                                            </tbody>
                                          </table>";
                                          $sr=1;
                                          echo "<table class='table  '>
                                                <thead><tr>
                                            <td style='border:none;font-size: 15px;'><b> Name :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$name."</td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;float: right;font-size: 15px;'><b>Date :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$date."</td>
                                            </tr>
                                            <tr>
                                                <td style='border:none;font-size: 15px;'><b>Order ID :</b></td>
                                                <td style='border: none;font-size: 15px;'>".$id."</td>
                                                <td style='border:none;'></td>
                                                <td style='border: none;'></td>
                                                <td style='border:none;'></td>

                                            </tr>
                                        </thead>
                                        <thead>
                                          <tr  style='background-color:#830dbf;color:white'>
                                            <th>Sr</th>
                                            <th>Detail</th>
                                            <th>Quantity</th>
                                            <th>Price/unit</th>
                                            <th>Total</th>
                                          </tr>
                                          </thead>
                                        <tbody>
                                            <tr>
                                                <td>".$sr."</td>
                                                <td>".$detail."</td>
                                                <td>".$quantity."</td>
                                                <td>".$price."</td>
                                                <td>".$quantity*$price."</td>
                                            </tr>
                                        
                                           ";
                                           $gold=$id;
                                           $sr++;



                                          
                                       }
                                      $previous=$current;
                                        // echo "Finished";
                                    }   echo "<tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;font-size: 15px;' colspan='2' >Total</td>
                                            <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$ptotal."</td>
                                        </tr>
                                        <tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Payment</td>
                                            <td style=border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp; ".$ppay."</td>
                                        </tr >
                                        <tr >
                                            <td style='border:none;'>
                                             <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-lg btn-primary' >Print</a>
                                             <button id='dlt' val=".$gold." type='button' class='btn btn-lg btn-danger'>Delete</a>
                                            </td>
                                            <td style='border:none;'></td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
                                            <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
                                                </tr>
                                            </tbody>
                                          </table>";
                                         




                                }
                                else
                                    echo "No Record Found";

                                ?> -->

                            </div>

                        </div>
                        <!-- <div class="table-responsive" id="data"> 
                        <?php
                            $query=mysqli_query($con,"select * from sale");
                            if(mysqli_num_rows($query))
                            {
                                echo "<table class='table table-hover '>
                                                <thead >
                                                  <tr class='' style='background-color:#b76af7;color:white;'>
                                                    <th>Date</th>
                                                    <th>Order Id</th>
                                                    <th>Person/Company name</th>
                                                    <th>Detail</th>
                                                    <th>Quantity</th>
                                                    <th>Price/unit</th>
                                                    <th>Total</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                            ";
                                while($row=mysqli_fetch_array($query))
                                {
                                    $detail=$row['detail'];
                                    $date=$row['date'];
                                    $name=$row['name'];
                                    $order_id=$row['order_id'];
                                    $quantity=$row['quantity'];
                                    $price=$row['price'];
                                    $total=$quantity*$price;
                                    echo "
                                                  <tr style='background-color:white'>
                                                    <td>".$date."</td>
                                                    <td>".$order_id."</td>
                                                    <td>".$name."</td>
                                                    <td>".$detail."</td>
                                                    <td>".$quantity."</td>
                                                    <td>".$price."</td>
                                                    <td>".$total."</td>
                                                  </tr>  ";
                                }
                                echo "
                                                </tbody>
                                              </table>
                                            ";

                            }
                            else
                            {
                                echo "<p class='text text-danger text-xsm' style='color:#5a08a3;font-size:30px;'>No Record found</p>";
                            }






                        ?>







                            <table class="table table-hover table-striped">
                            <thead>
                              <tr class="danger">
                                <th>Date</th>
                                <th>Order Id</th>
                                <th>Detail</th>
                                <th>Person/Company name</th>
                                <th>Quantity</th>
                                <th>Price/unit</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Remainig</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="success">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="success">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="info">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="info">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="info">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="success">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="success">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure LeatherTwo Green Hand Gloves 2/2 Pure LeatherTwo Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="primary">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="primary">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr>
                              <tr class="primary">
                                <td>23-05-2018</td>
                                <td>12345</td>
                                <td>Two Green Hand Gloves 2/2 Pure Leather</td>
                                <td>Ramzan EnterPrises sialkot</td>
                                <td>100</td>
                                <td>1200</td>
                                <td>204005</td>
                                <td>105800</td>
                                <td>100000</td>
                              </tr> 
                            </tbody>
                          </table> 
                        </div>   
                    </div>
                <div class="panel-footer text-center">
                    &copy; Copyright Glowing Neon Industries
                </div>
                </div>
                
            </div>
        </div> 

    </div>

    <!-- 
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <!-- <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="border-bottom:none;margin-bottom: 50px;">
                    <a href="#" style="font-size: 30px;margin-left: -20px;">
                        <i class="fa fa-dashboard"> Dashboard</i>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-history"></i> Ledger</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> Employers</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> Customer</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> Borker</a>
                </li>
            </ul>
        </div> -->
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- <div id="page-content-wrapper">
            <div class="container">
                <h1>Simple Sidebar</h1>
                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>
                <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Default</td>
        <td>Defaultson</td>
        <td>def@somemail.com</td>
      </tr>      
      <tr class="success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr class="danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
      </tr>
      <tr class="active">
        <td>Active</td>
        <td>Activeson</td>
        <td>act@example.com</td>
      </tr>
    </tbody>
  </table>
            </div>
        </div> -->
        <!-- /#page-content-wrapper -->

    <!-- </div> -->
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->

        <!-- Menu Toggle Script -->
      <!--   <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
   --> 
 <script type="text/javascript">
       $(document).ready(function(){
            var limit = 7; //The number of records to display per request
             var start = 0; //The starting pointer of the data
             var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
             function load_country_data(limit, start)
             {
              $.ajax({
               url:"action.php",
               method:"POST",
               data:{lim:1,limit:limit, start:start},
               cache:false,
               success:function(data)
               {
                
                $('#data').append(data);
                if(data == '')
                {
                 $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                 action = 'active';
                }
                else
                {
                 $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
                 action = 'inactive';
                }
                
               }
              });
             }
             if(action == 'inactive')
             {
              action = 'active';
              load_country_data(limit, start);
             }
             $(window).scroll(function(){
              if($(window).scrollTop() + $(window).height() > $("#data").height() && action == 'inactive')
              {
               action = 'active';
               start = start + limit;
               setTimeout(function(){
                load_country_data(limit, start);
               }, 1000);
              }
             });
             $(document).on('click', '#dlt', function(){ 
                
                var id=$(this).attr("val");
                
                var r = confirm("Confirm want to Delete!");
              if (r == true) {
                  $.ajax({
                    method :"post",
                    url:"action.php",
                    data:{dltd:1,oid:id},
                    success:function(data){
                        alert(data);
                        location.reload();
                    }
                  });
                    
              } else {
              var  txt = "You pressed Cancel!";
              }
             }); 
        


          // $("#print").click(function(){
          //    var divToPrint=document.getElementById("data");
          //      newWin= window.open("");
          //      newWin.document.write(divToPrint.outerHTML);
          //      newWin.print();
          //      newWin.close();
          // });




$('#date').change(function(){

    var date=$('#date').val();
              all=false;
              $.ajax({
               url:"action.php",
               method:"POST",
               data:{dsale:1,date:date},
               cache:false,
               success:function(data)
               {
                $('#data').html(data);
                
                
               }
              });});
         $('#addWork').attr("class","hvr-overline-from-center");
          $('#addPurchase').attr("class","hvr-overline-from-center");
          $('#addSale').attr("class","hvr-overline-from-center");
$('#checkout').attr("class","hvr-overline-from-center");
  
        });
	
   </script>
   </div>
  
                <div class="panel-footer text-center" style="color:#0a7726;">
                    &copy; Copyright Glowing Neon Industries
                </div>
        </div>
	</body>
</html