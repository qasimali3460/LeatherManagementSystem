  <?php 
  session_start();

    if(!isset($_SESSION['client']))
      $_SESSION['client']=uniqid();
    
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
            <div class="col-md-10 wow rollIn" style="">
                <div class="container-fluid" style="background: rgba(100,100,100,1);padding-top: 30px; background-image: url('img/work2.jpg');background-position:center; background-size: 100% auto; ">
                  <form class="form-form horizontal">
                                <div class="row">

                                    <div class="col-md-6" id="cart">
                                          <!-- <div class="panel-heading">  
                                                <i class="glyphicon glyphicon-shopping-cart"> Cart</iff>
                                             </div>
                                             <div class="panel-body" style="background-color: #fff;height: 300px; overflow-y: scroll;   " > 
                                                <div class="container-fluid">
                                                   -->
                                                    <div class="table-responsive" id="stable" style="margin-top:-40px;" >
                                                    
                                                 <table  id='saletable' class='table table-hover table-striped' >
                                                    <thead  style='success'>
                                                      <caption class='text-center'><p style='color: #083e6b;'> 

                                            <span style='font-size:20px;color:red;border: 1px solid green;' id='gtotal'>Total : </span>

                                                      </p></caption>
                                                    
                                                      <tr >
                                                        <th>ID</th>
                                                        <th>Detail</th>
                                                        <th>qt</th>
                                                        <th>price</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                  </table>
                                                </div> 
                                          
                                           
                                </div>
                                    <div class="col-md-6">
                                        
                                        <div id="products" style="background-color: rgba(216,210,139,0.8); padding: 10px;border-radius: 15px;box-shadow: 5px 4px 20px 0px #000000;">
                                          <br> 
                                        <div class="row">
                                          <div class="col-md-4"></div>
                                          <span id="error" style="color: red; font-size: 16px;"></span>
                                        </div>        
                                        <div class="row" id=""> 

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" style="font-size: 15px;" for="name">Select Supplier</label>
                                            <div class="col-sm-8">
                                              <input id="employee" name="employee" list="allNames" class="form-control" placeholder="Enter name of Employee" />
                                              <datalist id="allNames">
                                                  <?php
                                                    $query=mysqli_query($con,"select * from employer where  status='0'");
                                                    if(mysqli_num_rows($query)>0)
                                                    {
                                                      while ($row=mysqli_fetch_array($query)) {
                                                          echo "
                                                            <option value=".$row['cid']."&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name'].">  
                                                          ";
                                                      }
                                                    }


                                                  ?>
                                                  <!-- <option value="1000:     Adnan1"/>   -->
                                              </datalist>   
                                            </div>
                                          </div>
                                        </div>  
                                        <br>
                                        <div class="row" id="">
                                            <div class="form-group">
                                              <label style="font-size: 15px;" class="control-label col-sm-4" for="name">Product Detail</label>
                                              <div class="col-sm-8">
                                                <textarea id="detail" name="detail" class="form-control" style="height: 100px;" placeholder="Detail About Product"></textarea>   
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" id="">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="name">Quantity</label>
                                              <div class="col-sm-8">
                                                <input id="quantity" type="number" name="Quantity" class="form-control" placeholder="Enter Quantity of Product" >
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" id="">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="name">Price/Unit</label>
                                              <div class="col-sm-8">
                                                <input id="price" type="number" name="price" class="form-control" placeholder="Price of Product">
                                              </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" id="">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="extra">Extra Costs</label>
                                              <div class="col-sm-8">
                                                <input id="extra" type="number" name="extra" class="form-control" placeholder="Extra Costs (optional)">
                                              </div>
                                            </div>
                                        </div>
                                        <br><br>

                                        <div class="row">
                                        <button type="button" class="btn btn-primary  "  id="addToCart" style=""><i class="glyphicon glyphicon-shopping-cart"> </i>AddToCart</button>
                                          <input type="reset"  name="reset" id="reset" class="btn btn-warning pull-right " style="margin-left: 5px;">
                                                                                
                                        <button type="button"   name="cancel" id="cancel" class="btn btn-danger pull-right " style="margin-left: 20px;">
                                          Cancel
                                        </button>

                                        <button type="button" name="submit" id="submit" class="btn btn-info pull-right "><i class="fa fa-dollar"></i> Order</button>
                                        
                                        <br>
                                        <script type="text/javascript">
                                          $("#ok").hide();
                                        </script>

                                        </div>
                                        <br>
                                        </div>

                                        <div class="row" style="background-color: #D8D28B; padding: 10px;border-radius: 15px;box-shadow: 5px 4px 20px 0px #000000;" id="transaction">
                                            <div class="form-group">
                                              <label class="control-label col-sm-4" style="font-size: 15px;" for="Payment Recieved">Payment Recieved</label>
                                              <div class="col-sm-8">
                                                <input id="payment" type="number" name="extra" class="form-control" placeholder="Payment Recieved from Customer">
                                              </div>
                                              <br><br>
                                              <br>
                                              <button type="button" name="cancel2" style="margin-left: 10px;" id="cancel2" class="btn btn-danger pull-right " >Cancel</button>
                                              <button type="button" name="ok" id="ok"  class="btn btn-success pull-right " >Ok</button>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                          $("#transaction").hide();

                                        </script>
                                        <br>
                                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="minibill">Get Total</button> -->
                                        

                                        
                                        
                                    </div>
                                <div class="row" style="margin-top: 10px;">
                                  <p> </p>
                                </div>
                            </form>
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
   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm Order</h4>
      </div>
      <div class="modal-body">
        <p id="billdata" style="font-size: 18px;"></p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirm">Confirm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>




   <script type="text/javascript">
        var user=false;
        var personId;
        $("#submit").click(function(){
          // alert(document.getElementById("saletable").rows.length);
          if(document.getElementById("saletable").rows.length>1)
          {
              
          $("#products").hide(1000);
          $("#transaction").show(1000);
          $("#addToCart").hide(1000);
          $("#reset").hide(1000);
          $("#submit").hide(1000);
          $("#ok").show(1000);

          }
          else
            alert("Add an item to Cart first");
});  
        $("#ok").click(function(){
          var p=$("#payment").val();
           if(document.getElementById("saletable").rows.length>1)
          {
            
          if(isNaN(p))
          {
            alert('Please Add Payment first');
          }
          else
          {
            $.ajax({
              method:"post",
              url : "action3.php",
              data:{getbill:1,pm:p,pid:personId},
              success : function(data)
              {
                // alert(data);
                $("#billdata").html(data);
              }



            });
          }
          $("#myModal").modal("show");
          }
        });
        $("#confirm").click(function(){
          var p=$("#payment").val();
          // alert(p);
          $.ajax({
                    method:"post",
                    url:"action3.php",
                    data:{confirmed:1,pid:personId,payment:p},
                    success:function(data){
                      var order_id=data;
                      var win = window.open("purchasePrint.php?order_id="+order_id, '_blank');
                      win.focus();
                   alert("Sale successfull");  
                    
                      
                   location.reload();
                    }
                 });
        });
        $("#addToCart").click(function(){
          var detail=$("#detail").val();
          var quantity=$("#quantity").val();
          var price=$("#price").val();
          var extra=$("#extra").val();
          if(user)
          {
            if(detail=="")
            {
              $("#error").text("* Please Add some Detail about Product *");
            }
            else
            {
              if(quantity=="")
              { 
                $("#error").text("* Enter Quantity of Product *");
              }
              else
              {
                if(price=="")
                {
                  $("#error").text("* Enter Price of Product *");
                }
                else
                { 
                  var total=quantity*parseFloat(price);
                  if(extra=="")
                  {
                    extra=0;
                    total=parseFloat(total)+parseFloat(extra);
                  }
                  else
                  {
                    total=parseFloat(total)+parseFloat(extra);
                  }
                  alert(total);

                  $.ajax({
                    method:"post",
                    url : "action3.php",
                    data : {salecart:1,pid:personId,dt:detail,qt:quantity,pr:price,ex:extra},
                    success:function(data)
                    {
                         $.ajax({
                          method:"post",
                          url:"action3.php",
                          data:{cart:1,pid:personId},
                          success:function(data){
                         $("#stable").html(data);
                            
                          }
                         });
                         
                  $.ajax({
                    method:"post",
                    url : "action3.php",
                    data : {saletotal:1,pid:personId},
                    success:function(data)
                    {
                      
                         $("#gtotal").text(data);
                         $("#detail").val("");
                         $("#quantity").val("");
                         $("#price").val("");
                         $("#extra").val("");

                         
                    }


                  });
                    }


                  });


                }
              }
            }
          }
          else
          {
              $("#error").text("* Select a customer first *");
            
          }


        });




       $( "#employee" ).change(function() {
          var emp=$("#employee").val();
          var ind=emp.lastIndexOf(":");
          var id=emp.slice(0,ind);
          var emp=$("#employee").val();
          var ind=emp.lastIndexOf(":");
          var idm=emp.slice(0,ind);
          personId=idm;
          
          $.ajax({
            method:"post",
            url : "action3.php",
            data : {cimage:1,cid:idm},
            success:function(data)
            {
              
              $("#user").attr("src",data);
              user=true;
              $("#employee").prop("disabled", true); 
                    
                 $.ajax({
                  method:"post",
                  url:"action3.php",
                  data:{cart:1,pid:personId},
                  success:function(data){
                 $("#stable").html(data);
                    $.ajax({
                    method:"post",
                    url : "action3.php",
                    data : {saletotal:1,pid:personId},
                    success:function(data)
                    {
                          
                         $("#gtotal").text(data);
                         
                    }


                  });
                  }
                 });
          }


          });




        });
       $("#reset").click(function(){
              if(user)
              {
                var r = confirm("Confirm want to Delete!");
              if (r == true) {
                  console.error("im here");
                  $("#employee").prop("disabled", false);
                  $("#user").attr("src","img/user.png");
                  $.ajax({
                    method:"post",
                    url : "action3.php",
                    data : {resetsale:1},
                    success:function(data)
                    {
                      $("#saletable tbody #sdata").remove();
                        alert(data);   
                        
                    }


                  });
                  user=false;
                    
              } else {
              var  txt = "You pressed Cancel!";
              }
              }
              else
                alert('Nothing to Reset');
              
       });
       $(document).on('click', '#trash', function(){ 
            var id =$(this).attr("sid");
            $.ajax({
            
                    method:"post",
                    url : "action3.php",
                    data : {ssd:1,d:id},
                    success:function(data)
                    {
                      alert('Item Removed');
                      $.ajax({
                          method:"post",
                          url:"action3.php",
                          data:{cart:1,pid:personId},
                          success:function(data){
                         $("#stable").html(data);
                              $.ajax({
                              method:"post",
                              url : "action3.php",
                              data : {saletotal:1,pid:personId},
                              success:function(data)
                              {
                                
                                   $("#gtotal").text(data);
                                   
                              }


                            });  
                          }
                         });
                  }


            });
          });
       $("#cancel").click(function(){
              location.reload();
              
       });
       $("#cancel2").click(function(){
              location.reload();
              
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
          $('#addPurchase').attr("class","hvr-overline-from-center");
          $('#addSale').attr("class","hvr-overline-from-center");
          $('#addWork').attr("class","navactive");
          $('#checkout').attr("class","hvr-overline-from-center");
  
        });

   </script>
  </body>
</html