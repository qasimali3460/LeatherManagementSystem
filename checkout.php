  <?php 
    include 'header.php';
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
                        <a href="#" ><i class="fa fa-cart-arrow-down"></i> Checkout</a>
                    </div>
                    <div class="panel-body" style="background-color: #EEE6C1;border:1px solid #f2dc7d; ">
                        <p class="text-center text-Success" style="font-size:30px;color:green;">Payment Checkout</p>
                          <div class="container-fluid">
                            <form class="form-form horizontal">
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                        <div class="col-md-4 " style="">
                                            <img id ="user" src="img/user.png" class="img-rounded" style="height: 150px;">
                                            <br><br><br><br><br><br>
                                            <span style="font-size:18px;color:red;border: 1px solid green;" id="total">RS : 1000000</span>
                                         </div>       
                                </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="name">Select Employer</label>
                                              <div class="col-sm-8">
                                                <input id="employee" name="employee" list="allNames" class="form-control" placeholder="Enter name of Employer" />
                                                <datalist id="allNames">
                                                    <option value="Adnan1"/>  
                                                    <option value="Faizan2"/>   
                                                </datalist>   
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="extra">Extra Costs</label>
                                              <div class="col-sm-8">
                                                <input id="extra" type="number" name="extra" class="form-control" placeholder="Extra Costs (optional)">
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="name">Payment Given</label>
                                              <div class="col-sm-8">
                                                <input id="payment" type="number" name="payment" class="form-control" placeholder="Enter Payment to give" >
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="minibill">Get Total</button> -->
                                        
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-usd"></i></i>Mini Bill</button>
                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Mini Bill</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>
                                                  <span id="mtotal">Total Balance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 120000</span><br>
                                                  <span id="mextra">Extra Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 120000</span><br>
                                                  <span id="mpayment">Payment Given &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 10000</span><br>
                                                  <p>--------------------------------------</p>
                                                  <span id="mremaining">Remaining Balance : 20000</span>


                                                </p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <input type="reset"  name="reset" id="reset" class="btn btn-warning pull-right btn-lg" style="margin-left: 30px;">
                                        <input type="submit" name="submit" id="submit" class="btn btn-success pull-right btn-lg">

                                    </div>
                                <div class="row">
                                </div>
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
       $( "#employee" ).change(function() {
          // alert( $("#name").val() );
          $("#user").attr("src","img/qasim.jpg");
        });
       $("#minibill").click(function(){
          var q=$('#quantity').val();
          var p=$('#price').val();
          console.log($('#price').val());
          console.log($('#quantity').val());

          var x = parseFloat($('#price').val())*parseFloat($('#quantity').val());
          console.log('Your Total is '+x);
          if(isNaN(x))
          {
            $('#bill').text('Total :   '+0);

          }
          else
            $('#bill').text('Total :   '+x);

       });
   </script>
    <script type="text/javascript">
       $(document).ready(function(){
          $('#addWork').attr("class","a");
          $('#addPurchase').attr("class","");
          $('#addSale').attr("class","");
$('#checkout').attr("class","active");
      var num=parseFloat(299900.6)-parseFloat(899988.9);

      console.log(num.toFixed(1));
      $('#total').text('Rs : '+num.toFixed(1));
        });

   </script>
	</body>
</html  