  <?php 
    include 'header.php';
    include 'connection.php';
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
            <div class="col-md-2" id="menu">
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
                        <a href="customer.php" ><i class="fa fa-user"></i> Customer</a>
                    </li>
                    <li>
                        <a href="supplier.php"><i class="fa fa-user"></i> Supplier</a>
                    </li>
                    <li>
                        <a href="employer.php" style="color:#ff6e05;"><i class="fa fa-user"></i> Employers</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" style="" id="pnl">
                <div class="panel panel-success">
                    
                    <div class="panel-body" style="background-color: #EEE6C1;border:1px solid #f2dc7d; ">
                        <div class="container-fluid">
                            
                        <p class="text-center text-Success" style="font-size:30px;color:green;">Customer List
                            <a class="btn btn-danger pull-right" href="NewCustomer.php">Add New</a>
                        </p>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                    $query=mysqli_query($con,"select * from employer where  status='0'");
                                    if(mysqli_num_rows($query))
                                    {
                                        while($row=mysqli_fetch_array($query))
                                        {
                                            echo "
                                                <div class='col-md-3'>
                                    <div class='panel panel-info wow zoomIn'>
                                        <div class='panel-heading'>
                                            <span style='color:red;'>".$row['cid']."</span>

                                        </div>
                                        <div class='panel-body text-center'>
                                           <center><img src='img/".$row['image']."' class='img-responsive' style='float:center; height: 200px;width: 200px;'></center>
                                        </div>
                                        <div class='panel-heading'>
                                           <span style='color:red'>".$row['name']."</span>
                                            <a href='employerDetail.php?id=".$row['cid']."' type='button' class='btn btn-success btn-xs' style='float: right'>View</a>
                                        </div>
                                    </div>
                                </div>


                                            ";

                                        }
                                    }
                                    else
                                    {
                                        echo "<p class='text text-danger text-xsm' style='color:#5a08a3;font-size:30px;'>No Customer Account found</p>";
                                    }

                                ?>





                                <div class="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            15401556       
                                        </div>
                                        <div class="panel-body text-center">
                                           <center><img src="img/user.png" class="img-responsive" style="float:center; height: 200px;width: 200px;"></center>
                                        </div>
                                        <div class="panel-heading">
                                            Qasim ali
                                            <a href="customerDetail.php" type="button" class="btn btn-primary btn-xs" style="float: right">View</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            15401556       
                                        </div>
                                        <div class="panel-body text-center">
                                           <center><img src="img/user.png" class="img-responsive" style="float:center; height: 200px;width: 200px;"></center>
                                        </div>
                                        <div class="panel-heading">
                                            Qasim ali
                                            <button type="button" class="btn btn-primary btn-xs" style="float: right">View</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            15401556       
                                        </div>
                                        <div class="panel-body text-center">
                                           <center><img src="img/user.png" class="img-responsive" style="float:center; height: 200px;width: 200px;"></center>
                                        </div>
                                        <div class="panel-heading">
                                            Qasim ali
                                            <button type="button" class="btn btn-primary btn-xs" style="float: right">View</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            15401556       
                                        </div>
                                        <div class="panel-body text-center">
                                           <center><img src="img/user.png" class="img-responsive" style="float:center; height: 200px;width: 200px;"></center>
                                        </div>
                                        <div class="panel-heading">
                                            Qasim ali
                                            <button type="button" class="btn btn-primary btn-xs" style="float: right">View</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            15401556       
                                        </div>
                                        <div class="panel-body text-center">
                                           <center><img src="img/user.png" class="img-responsive" style="float:center; height: 200px;width: 200px;"></center>
                                        </div>
                                        <div class="panel-heading">
                                            Qasim ali
                                            <button type="button" class="btn btn-primary btn-xs" style="float: right">View</button>
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


    


   <script type="text/javascript">
       $(document).ready(function(){
          $('#addWork').attr("class","hvr-overline-from-center");
          $('#addPurchase').attr("class","hvr-overline-from-center");
          $('#addSale').attr("class","hvr-overline-from-center");
$('#checkout').attr("class","hvr-overline-from-center");
  
        });

   </script>
	</body>
</html