<?php
    include 'header.php';
    include 'ncustomer.php';
 ?>	
	<div class="container-fluid">
        <div class="row" >
            <div class="col-md-2" style="background-color: rd">
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
            <div class="col-md-10" style="">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <a href="#" ><i class="fa fa-cart-arrow-down"></i> New Customer</a>
                    </div>
                    <div class="panel-body" style="background-color: #EEE6C1;border:1px solid #f2dc7d; ">
                        <p class="text-center text-Success" style="font-size:30px;color:green;">Add New Customer Account
                        </p>
                        <div class="container-fluid">
                            <form action="?" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Full Name</label>
                                  <div class="col-sm-4">
                                    <input type="Text" class="form-control" id="name" placeholder="Enter Username" name="name" required>
                                  </div>
                                  <label class="control-label col-sm-2" for="name">Profile Image</label>
                                  <div class="col-sm-4">
                                  
                                  <input type="file" class="form-control" name="im" id="im" value="images/user.jpg">

                                </div>
                                </div><br>
                                <br>
                                <br>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="ph#1">Phone#1</label>
                                  <div class="col-sm-4">
                                    <input type="tel" class="form-control" placeholder="0346-6617872" id="ph1" name="ph1" pattern="[0-9]{4}-[0-9]{7}">
                                  </div>
                                  <label class="control-label col-sm-2" for="ph2">Phone#2</label>
                                  <div class="col-sm-4">
                                  <input type="tel" class="form-control" placeholder="0346-6617872" id="ph2" name="ph2" pattern="[0-9]{4}-[0-9]{7}"></div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                  </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Address</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" placeholder="Enter Email" name="address">
                                  </div>
                                </div>
                                <br><br>    
                                <a href="employer.php" type="button" class="btn btn-danger btn-lg pull-right" name="submit" style="margin-left: 20px;" >
                                    Cancel
                                </a>
                                <!-- <input type="submit" class="btn btn-success btn-lg pull-right" name="submit"> -->
                          <input type="submit" value="Submit" name="submit" class="btn btn-success btn-lg pull-right">
                          <button type="button" id="csubmit">Update</button>
                        </form>
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
        $('#csubmit').click(function(){
          alert('going tro send requert');

           $.ajax({
              url:"ncustomer.php",
              method:"post",
              data:$('form').serialize(),
              success:function(data)
              {

                // $('#data').html(data);            
              alert(data);
              }
            });
    



        });





          $('#addWork').attr("class","");
          $('#addPurchase').attr("class","");
          $('#addSale').attr("class","");
          $('#checkout').attr("class","");
  
        });

   </script>
  
   <!-- </script> -->
	</body>
</html