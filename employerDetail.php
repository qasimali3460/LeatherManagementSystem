<?php 
    include 'header.php';
 ?>
    <?php
//        echo "<script type='text/javascript'>
//         $(document).ready(function () {
//         // Handler for .ready() called.
//         $('html, body').animate({
//             scrollTop: $('#demo').offset().top
//         }, 'slow');
//     });
//    </script>
    
// ";
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $img="user.png";
    }
    else
        header('location:index.php');
    ?>


  <script type="text/javascript">
    var once=false;
    $(document).ready(function () {
    var $obj = $('#menu');
    var $obj2 = $('#pnl');
    var $obj3 = $('#nbar');

    var top = $obj.offset().top - parseFloat($obj3.css('marginTop').replace(/auto/, 0));

    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

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
    });
  });
  </script>
    
    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-2" id="menu" style="background-color: rd">
                <ul class="nav nav-pills nav-stacked text-center">
                    <li class="active">
                        <a href="#"><i class="fa fa-history"></i> Ledger</a>
                    </li>
                    <li><a href="index.php"><i class="fa fa-shopping-cart"></i> Sales</a></li>
                    <li><a href="purchases.php"><i class="fa fa-cart-arrow-down"></i> Purchases</a></li>
                    <br><br>
                    <li class="active" >
                        <a href="#" >
                            <i class="fa fa-user-circle"> Accounts</i>
                        </a>
                      </li>
                    <li>
                        <a href="customer.php" style=""><i class="fa fa-user"></i> Customer</a>
                    </li>
                    <li>
                        <a href="supplier.php"><i class="fa fa-user"></i> Supplier</a>
                    </li>
                    <li class="">
                        <a href="employer.php" style="color:#ff6e05;"><i class="fa fa-user"></i> Employers</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="pnl" style="">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <a href="#" ><i class="fa fa-user-circle"></i> Customer</a>
                    </div>
                    <div class="panel-body" style="background-color: #EEE6C1;border:1px solid #f2dc7d; ">
                        <p class="text-center text-Success" style="font-size:30px;color:green;">Customer info</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            Personal Info
                                        </div>
                                        <div class="panel-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-striped">
                                                            <tbody>
                                                                <?php
                                    $query=mysqli_query($con,"select * from employer where cid='$id'");
                                    if(mysqli_num_rows($query))
                                    {
                                        while($row=mysqli_fetch_array($query))
                                        {
                                            echo "<tr class='success'>
                                                                    <td><b>ID :</b></td>
                                                                    <td>".$row['cid']."</td>
                                                                </tr> 
                                                                <tr class='success'>
                                                                    <td><b>Name :</b></td>
                                                                    <td>".$row['name']."</td>
                                                                </tr> 
                                                                <tr class='success'>
                                                                    <td><b>Phone 1 :</b></td>
                                                                    <td>".$row['ph1']."</td>
                                                                </tr> 
                                                                <tr class='success'>
                                                                    <td><b>Phone 2 :</b></td>
                                                                    <td>".$row['ph2']."</td>
                                                                </tr> 
                                                                <tr class='success'>
                                                                    <td><b>Email :</b></td>
                                                                    <td>".$row['email']."</td>
                                                                </tr> 
                                                                <tr class='success'>
                                                                    <td><b>Address :</b></td>
                                                                    <td>".$row['address']."</td>
                                                                </tr> ";
                                                                $img=$row['image'];
                                        }
                                    }
                                    else
                                    {
                                        echo "<p class='text text-danger text-xsm' style='color:#5a08a3;font-size:30px;'>No Customer Account found</p>";
                                    }

                                ?>





                                                                <!-- <tr class="success">
                                                                    <td><b>ID :</b></td>
                                                                    <td>1540155</td>
                                                                </tr> 
                                                                <tr class="success">
                                                                    <td><b>Name :</b></td>
                                                                    <td>Qasim</td>
                                                                </tr> 
                                                                <tr class="success">
                                                                    <td><b>Phone 1 :</b></td>
                                                                    <td>03466617872</td>
                                                                </tr> 
                                                                <tr class="success">
                                                                    <td><b>Phone 2 :</b></td>
                                                                    <td>03466617872</td>
                                                                </tr> 
                                                                <tr class="success">
                                                                    <td><b>Email :</b></td>
                                                                    <td>muhammad.alimund@gmail.com</td>
                                                                </tr> 
                                                                <tr class="success">
                                                                    <td><b>Address :</b></td>
                                                                    <td>Jamkey cheema tehsil Daska District Sialkot</td>
                                                                </tr> --> 
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-4" style="background-color: ">
                                                        <img src="img/<?php  echo $img?>" class="img-responsive" style="height: 200px;">

                                                    </div>    
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-5 col-md-offset-7 ">
                                                        <div class="panel panel-primary ">
                                                            <div class="panel-heading text-center" style="background-color: #ff5a00;">
                                                                <p style="font-size: 30px">     Total Balance : 
                                                                    <span><?php
                                                                        $qur=mysqli_query($con,"select * from employer where cid='$id' ");
                                                                        while($row=mysqli_fetch_array($qur))
                                                                        {
                                                                            echo $row['balance'];
                                                                        }
                                                                     ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-info">
                                        <div class="panel panel-heading">
                                          Ledger  
                                        </div>
                                        <div class="panel-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
															if(true)
															  {

															  $query = mysqli_query($con, "SELECT * FROM work where p_id='$id'  ORDER BY id DESC ");
															  
																if(mysqli_num_rows($query)>0)
																{

																							echo "<table class='table wow fadeInUpBig '>
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
																									<th width='3%'>Sr</th>
																									<th width=50%>Detail</th>
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
																									 <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-primary' ><span class='glyphicon glyphicon-print'></span> Print</a>
																									</td>
																									<td style='border:none;'>

																									 <button id='dlt' val=".$gold." type='button' class='btn  btn-danger'>Delete</button>
																									
																									</td>
																									<td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
																									<td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
																										</tr>
																									</tbody>
																								  </table>";
																								  $sr=1;
																								  echo "<table class='table wow fadeInUpBig '>
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
																									<th width='3%'>Sr</th>
																									<th width=50%>Detail</th>
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
																									 <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-primary' ><span class='glyphicon glyphicon-print'></span> Print</a></td>
																									<td style='border:none;'>

																									 <button id='dlt' val=".$gold." type='button' class='btn  btn-danger'>Delete</button>
																									
																									</td>
																									<td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
																									<td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
																										</tr>
																									</tbody>
																								  </table>";
																								 




        }



      }
														?>
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
    <div id="demo">Qasim Ali</div>



 <script type="text/javascript">
       $(document).ready(function(){
          
         $('#addWork').attr("class","hvr-overline-from-center");
          $('#addPurchase').attr("class","hvr-overline-from-center");
          $('#addSale').attr("class","hvr-overline-from-center");
$('#checkout').attr("class","hvr-overline-from-center");

             $(document).on('click', '#dlt', function(){ 
                
                var id=$(this).attr("val");
                
                var r = confirm("Confirm want to Delete!");
              if (r == true) {
                  $.ajax({
                    method :"post",
                    url:"action3.php",
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

  
        });

   </script>
	</body>
</html