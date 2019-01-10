<?php

    include 'connection.php';
    session_start();   
  
    $pay;
     $totalProduts;
     $total;
     $remaining; 
  if(isset($_POST['cimage']))
    {
      
      $id=$_POST['cid'];
      $query=mysqli_query($con,"select image from customer where cid='$id'");
      while ($row=mysqli_fetch_array($query)) {
          $image=$row[0];
          echo "img/".$image;

      }
    }


  if(isset($_POST['salecart']))
    {

      
      $id=$_POST['pid'];
      $detail=$_POST['dt'];
      $qt=$_POST['qt'];
      $price=$_POST['pr'];
      $extra=$_POST['ex'];
      $formatdate=date("Y-m-d");
      echo $formatdate; 
      $total=$price*$qt;
      $total+=$extra;
      $client=$_SESSION['client'];
      // echo "Session Id is ".$client; 
      $query=mysqli_query($con,"insert into scart (pid,detail,qt,pr,extra,total,client,date)values('$id','$detail','$qt','$price','$extra','$total','$client','$formatdate')");
      if($query)
      {
        echo "Product added to the cart";
      }
      
    }
    if(isset($_POST["confirmed"]))
    {
      $client=$_SESSION['client'];
      $pid=$_POST['pid'];
      $payment=$_POST['payment'];
      $name;
      $detail;
      $date;
      $price;
      $qt;
      $extra;
      $total;
      $ttl;
      $order_id;

      $query=mysqli_query($con,"select max(order_id) from sale ");
      while($row=mysqli_fetch_array($query))
        $order_id=$row[0];
      
      $query=mysqli_query($con,"select max(order_id) from purchase ");
      while($row=mysqli_fetch_array($query))
      {
        $temp=$row[0];
        if($order_id<$temp)
          $order_id=$temp;
      }      
      $order_id++;





      $query=mysqli_query($con,"select * from customer where cid='$pid'");
      while($row=mysqli_fetch_array($query))
        $name=$row['name'];

      

      $query=mysqli_query($con,"select sum(total) from scart where client='$client' and pid='$pid'");
      while($row=mysqli_fetch_array($query))
        $total=$row[0];

        $remaining=$total-$payment;

       $query=mysqli_query($con,"select * from customer where cid='$pid'");
       if(mysqli_num_rows($query))
       {
          while($row=mysqli_fetch_array($query))
          {
            $remaining+=$row['balance'];
          }
       }



      $query=mysqli_query($con,"select * from scart where client='$client' and pid='$pid'");
      $status=false;
      while($row=mysqli_fetch_array($query))
        {
            $detail=$row['detail'];
            $date=$row['date'];
            $price=$row['pr'];
            $qt=$row['qt'];
            $extra=$row['extra'];
            $query2=mysqli_query($con,"insert into sale(date,order_id,detail,name,quantity,price,total,p_id,payment,remaining,extra)values('$date','$order_id','$detail','$name','$qt','$price','$total','$pid','$payment','$remaining','$extra') ");
            if($query2)
            {
              $status=true;
            }
            


        }

        if($status)
          { 
            
           $query=mysqli_query($con,"update customer set balance='$remaining' where cid='$pid'");
            $query=mysqli_query($con,"delete from scart where pid='$pid' and client='$client'");
            echo $order_id;

          }


    }
    if(isset($_POST['ssd']))
    {
      $id=$_POST['d'];
      $query=mysqli_query($con,"delete from scart where id='$id'");
      if($query)
        echo "Product Deleted from cart";
      else
        echo "Failed To Delete Product From Cart";

    }
    if(isset($_POST["getbill"]))
    {
      $client=$_SESSION['client'];
      $pid=$_POST['pid'];
      $pay=$_POST['pm'];
     $totalProduts;
     $total;
     $remaining;
     $query=mysqli_query($con,"select count(id) from scart where client='$client' and pid='$pid'");
     if(mysqli_num_rows($query))
     {
        while($row=mysqli_fetch_array($query))
        {
          $totalProduts=$row[0];
        }
     }
     $query=mysqli_query($con,"select sum(total) from scart where client='$client' and pid='$pid'");
     if(mysqli_num_rows($query))
     {
        while($row=mysqli_fetch_array($query))
        {
          $total=$row[0];
        }
     }
     $remaining=$total-$pay;
     $query=mysqli_query($con,"select * from customer where cid='$pid'");
     if(mysqli_num_rows($query))
     {
        while($row=mysqli_fetch_array($query))
        {
          $remaining+=$row['balance'];
        }
     }

     echo "
      <table style='border-spacing:10px;margin:10px; border-collapse: separate;font-size18px;border:none;'>
        <tr style='border:none;'>
          <th style='border:none;'>Total Products </th>
          <td style='border:none;'> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$totalProduts."&nbsp;</td>
        </tr> 
        <tr >
          <th style='border:none;'>Total Bill </th>
          <td style='border:none;'> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$total."</td>
        </tr> 
        <tr>
          <th style='border:none;'>Payment </th>
          <td style='border:none;'> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pay."</td>
        </tr>
         <tr>
          <th style='border:none;'>Remaining Balance </th>
          <td style='border:none;'> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$remaining."</td>
        </tr>
      </table>

     ";



    }
 if(isset($_POST['lim']))
    {
      if(isset($_POST["limit"], $_POST["start"]))
      {

            $query = mysqli_query($con, "SELECT Distinct order_id FROM sale ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."");
            
         
          while($row=mysqli_fetch_array($query))
          {$sr=1;
            $header=true;
            $total;
            $remaining;
            $payment;     
          $id=$row['order_id'];
          $query2 = mysqli_query($con, "SELECT * from sale where order_id='$id'");
          while ($rows=mysqli_fetch_array($query2)) {
            
            if($header)
            {
              $total=$rows['total'];
              $payment=$rows['payment'];
              $remaining=$rows['remaining'];
              echo "                    
                                        <table class='wow fadeInUp' data-wow-delay=''>
                                          </thead>
                                            <tr>
                                            <td style='border:none;font-size: 15px;'><b> Name :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$rows['name']."</td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;float: right;font-size: 15px;'><b>Date :</b></td>
                                            <td style='border:none;font-size: 15px;'>".$rows['date']."</td>
                                            </tr>
                                            <tr>
                                                <td style='border:none;font-size: 15px;'><b>Order ID :</b></td>
                                                <td style='border: none;font-size: 15px;'>".$rows['order_id']."</td>
                                                <td style='border:none;'></td>
                                                <td style='border: none;'></td>
                                                <td style='border:none;'></td>
                                                 <tr  style='background-color:#8828E7;color:white;height:40px;'>
                                                  <th width='3%'>Sr</th>
                                                  <th width=50%>Detail</th>
                                                  <th>Quantity</th>
                                                  <th>Price/unit</th>
                                                  <th>Total</th>
                                                </tr>
                                            </tr>
                                        </thead>
                                        <thead>
                                         
                                          </thead>
                                        <tbody>";
                                        $header=false;
                                        echo "
                                            <tr>
                                                <td>".$sr."</td>
                                                <td>".$rows['detail']."</td>
                                                <td>".$rows['quantity']."</td>
                                                <td>".$rows['price']."</td>
                                                <td>".$rows['quantity']*$rows['price']."</td>
                                            </tr>
                                        
                                          ";
                                    
            }
            else
              {

                 echo "
                                            <tr>
                                                <td>".$sr."</td>
                                                <td>".$rows['detail']."</td>
                                                <td>".$rows['quantity']."</td>
                                                <td>".$rows['price']."</td>
                                                <td>".$rows['quantity']*$rows['price']."</td>
                                            </tr>
                                        
                                          ";
              }
              $sr++;

          


          }
           echo "<tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border: none;font-size: 15px;' colspan='2' >Total</td>
                                            <td style=border:none;font-size: 15px;>: &nbsp;&nbsp;&nbsp;".$total."</td>
                                                
                                        </tr>
                                        <tr>
                                            <td style='border:none;'></td>
                                            <td style='border:none;'></td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Payment</td>
                                            <td style=border:none;font-size: 15px;>: &nbsp;&nbsp;&nbsp;".$payment."</td>

                                        </tr >
                                        <tr >
                                            <td style='border:none;'>
                                             <a href='salePrint.php?order_id=".$id."' id='edit' target='_blank' type='button' class='btn btn-primary' ><span class='glyphicon glyphicon-print'></span> Print</a>
                                            </td>
                                            <td style='border:none;'>

                                             <button id='dlt' val=".$id." type='button' class='btn  btn-danger'>Delete</button>
                                            
                                            </td>
                                            <td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
                                            <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$remaining."</td>
                                                </tr>
                                            </tbody>
                                          </table>
                                          <br/><br>
                                          ";





          }


      }
    }



    // if(isset($_POST['lim']))
    // {
    //   if(isset($_POST["limit"], $_POST["start"]))
    //   {

    //   $query = mysqli_query($con, "SELECT * FROM sale ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."");
      

    //     if(mysqli_num_rows($query)>0)
    //     {

      // $query = "SELECT * FROM sale ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
                                   //  echo "<table class='table  '>
                                   // <thead>
                                   //         ";
                                   //         $current;
                                   //         $previous;
                                   //         $p=1;
                                   //         $pro=1;
                                   //         $sr=1;
                                   //         $id;
                                   //  $date;
                                   //  $detail;
                                   //  $name;
                                   //  $quantity;
                                   //  $price;
                                   //  $total;
                                   //  $payment;
                                   //  $remaining;
                                   //  $current;
                                   //  $prem;
                                   //  $ppay;
                                   //  $ptotal;
                                   //  $gold;
                                   // while($row=mysqli_fetch_array($query))
                                   // {
                                   //      $id=$row['order_id'];
                                   //      // echo "Id :".$id;
                                   //      $date=$row['date'];
                                   //      $detail=$row['detail'];
                                   //      $name=$row['name'];
                                   //      $quantity=$row['quantity'];
                                   //      $price=$row['price'];
                                   //      $total=$row['total'];
                                   //      $payment=$row['payment'];
                                   //      $remaining=$row['remaining'];
                                   //      $current=$id;
                                   //      if($p==1)
                                   //      {
                                   //         $current=$id;
                                   //         $previous=$id;
                                   //         $p=0;
                                   //      }
                                   //      if($pro==1)
                                   //      {
                                   //        echo " <tr>
                                   //          <td style='border:none;font-size: 15px;'><b> Name :</b></td>
                                   //          <td style='border:none;font-size: 15px;'>".$name."</td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border: none;float: right;font-size: 15px;'><b>Date :</b></td>
                                   //          <td style='border:none;font-size: 15px;'>".$date."</td>
                                   //          </tr>
                                   //          <tr>
                                   //              <td style='border:none;font-size: 15px;'><b>Order ID :</b></td>
                                   //              <td style='border: none;font-size: 15px;'>".$id."</td>
                                   //              <td style='border:none;'></td>
                                   //              <td style='border: none;'></td>
                                   //              <td style='border:none;'></td>

                                   //          </tr>
                                   //      </thead>
                                   //      <thead>
                                   //        <tr  style='background-color:#830dbf;color:white'>
                                   //          <th width='3%'>Sr</th>
                                   //          <th width=50%>Detail</th>
                                   //          <th>Quantity</th>
                                   //          <th>Price/unit</th>
                                   //          <th>Total</th>
                                   //        </tr>
                                   //        </thead>
                                   //      <tbody>
                                   //          <tr>
                                   //              <td>".$sr."</td>
                                   //              <td>".$detail."</td>
                                   //              <td>".$quantity."</td>
                                   //              <td>".$price."</td>
                                   //              <td>".$quantity*$price."</td>
                                   //          </tr>
                                        
                                   //        ";
                                   //      $gold=$id;   
                                   //        $prem=$remaining;
                                   //        $ptotal=$total;
                                   //        $ppay=$payment;
                                   //        $sr++;
                                   //      $pro=2;
                                   //      continue;
                                   //      }
                                   //      if($current==$previous )
                                   //      {
                                   //         echo "
                                                
                                   //              <tr>
                                   //                  <td>".$sr."</td>
                                   //                  <td>".$detail."</td>
                                   //                  <td>".$quantity."</td>
                                   //                  <td>".$price."</td>
                                   //                  <td>".$quantity*$price."</td>
                                   //              </tr>
                                   //                ";

                                   //        $prem=$remaining;
                                   //        $ptotal=$total;
                                   //        $ppay=$payment;
                                   //        $sr++;
                                   //      }
                                   //      else
                                   //      {
                                   //          echo "<tr>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border: none;font-size: 15px;' colspan='2' >Total</td>
                                   //          <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$ptotal."</td>
                                   //      </tr>
                                   //      <tr>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;font-size: 15px;' colspan='2'>Payment</td>
                                   //          <td style=border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp; ".$ppay."</td>
                                   //      </tr >
                                   //      <tr >
                                   //          <td style='border:none;'>
                                   //           <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-primary' ><span class='glyphicon glyphicon-print'></span> Print</a>
                                   //          </td>
                                   //          <td style='border:none;'>

                                   //           <button id='dlt' val=".$gold." type='button' class='btn  btn-danger'>Delete</button>
                                            
                                   //          </td>
                                   //          <td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
                                   //          <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
                                   //              </tr>
                                   //          </tbody>
                                   //        </table>";
                                   //        $sr=1;
                                   //        echo "<table class='table  '>
                                   //              <thead><tr>
                                   //          <td style='border:none;font-size: 15px;'><b> Name :</b></td>
                                   //          <td style='border:none;font-size: 15px;'>".$name."</td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border: none;float: right;font-size: 15px;'><b>Date :</b></td>
                                   //          <td style='border:none;font-size: 15px;'>".$date."</td>
                                   //          </tr>
                                   //          <tr>
                                   //              <td style='border:none;font-size: 15px;'><b>Order ID :</b></td>
                                   //              <td style='border: none;font-size: 15px;'>".$id."</td>
                                   //              <td style='border:none;'></td>
                                   //              <td style='border: none;'></td>
                                   //              <td style='border:none;'></td>

                                   //          </tr>
                                   //      </thead>
                                   //      <thead>
                                   //        <tr  style='background-color:#830dbf;color:white'>
                                   //          <th width='3%'>Sr</th>
                                   //          <th width=50%>Detail</th>
                                   //          <th>Quantity</th>
                                   //          <th>Price/unit</th>
                                   //          <th>Total</th>
                                   //        </tr>
                                   //        </thead>
                                   //      <tbody>
                                   //          <tr>
                                   //              <td>".$sr."</td>
                                   //              <td>".$detail."</td>
                                   //              <td>".$quantity."</td>
                                   //              <td>".$price."</td>
                                   //              <td>".$quantity*$price."</td>
                                   //          </tr>
                                        
                                   //         ";
                                   //         $gold=$id;
                                   //         $sr++;



                                          
                                   //     }
                                   //    $previous=$current;
                                   //      // echo "Finished";
                                   //  }   echo "<tr>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border: none;font-size: 15px;' colspan='2' >Total</td>
                                   //          <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$ptotal."</td>
                                   //      </tr>
                                   //      <tr>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;'></td>
                                   //          <td style='border:none;font-size: 15px;' colspan='2'>Payment</td>
                                   //          <td style=border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp; ".$ppay."</td>
                                   //      </tr >
                                   //      <tr >
                                   //          <td style='border:none;'>
                                   //           <a href='salePrint.php?order_id=".$gold."' id='edit' target='_blank' type='button' class='btn btn-primary' ><span class='glyphicon glyphicon-print'></span> Print</a></td>
                                   //          <td style='border:none;'>

                                   //           <button id='dlt' val=".$gold." type='button' class='btn  btn-danger'>Delete</button>
                                            
                                   //          </td>
                                   //          <td style='border:none;font-size: 15px;' colspan='2'>Remaining</td>
                                   //          <td style='border:none;font-size: 15px;'>: &nbsp;&nbsp;&nbsp;".$prem."</td>
                                   //              </tr>
                                   //          </tbody>
                                   //        </table>";
                                         




    //     }



    //   }
    // }



    if(isset($_POST['dltd']))
    {
      echo "Reached here";
      $id=$_POST['oid'];
      $query=mysqli_query($con,"delete from sale where order_id='$id'  ");
      if($query)
        echo "Order Deleted Successfully";
      else
        echo "Failed to Delet sale ";
    }
    if(isset($_POST['cart']))
    {


        $client=$_SESSION['client'];
        $id=$_POST['pid'];
        $query2=mysqli_query($con,"select * from scart where client='$client' and pid='$id'");
        if(mysqli_num_rows($query2))
        {
          $count=1;
           echo "
              <table  id='saletable' class='table table-hover table-striped'  >
                                                    <thead  class='primary'>
                                                      <caption class='text-center'><p style='color: #083e6b;''>      
                                                        

                                            <span style='font-size:20px;color:red;border: 1px solid green;' id='gtotal'>Total : 9</span>

                                                      </p></caption>
                                                    
                                                      <tr >
                                                        
                                                      <th width='40%'>Detail</th>
                                                        <th>qt</th>
                                                        <th>price</th>
                                                        <th>Extra</th>
                                                        <th>Total</th>
                                                        <th width='5%'></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody> 
                                                    

            ";

          while($row=mysqli_fetch_array($query2))
          {

            $id=$row['pid'];
            $detail=$row['detail'];
            $qt=$row['qt'];
            $price=$row['pr'];
            $extra=$row['extra'];
            $total=$row['total'];
            $sid=$row['id'];
                       echo "
              
                <tr class='' id='sdata' style='background-color:#D8D28B;color:black;'>
                  <td>".$detail."</td>
                  <td>".$qt."</td>
                  <td>".$price."</td>
                  <td>".$extra."</td>
                  <td>".$total."</td>
                  <td>
                    <button type='button' id='trash' sid=".$sid." class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>
                  </td>
                </tr>             ";
            $count++;
          }
          echo "  </tbody>
                </table>";
        }
        else{
          echo "
              <table  id='saletable' class='table table-hover table-striped' >
                                                    <thead  style='success'>
                                                      <caption class='text-center'><p style='color: #083e6b;''>      
                                                        <button class='btn btn-danger pull-left' >
                                                          Clear
                                                        </button>

                                            <span style='font-size:20px;color:red;border: 1px solid green;' id='gtotal'>Total : 9</span>

                                                      </p></caption>
                                                    
                                                      <tr >
                                                        <th>Detail</th>
                                                        <th>qt</th>
                                                        <th>price</th>
                                                        <th>Total</th>
                                                        <th>Extra</th>
                                                        <th>Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody> 
                                                    

            ";
        }
        
    }

  if(isset($_POST['saletotal']))
    {
      $client=$_SESSION['client'];
      $id=$_POST['pid'];
      $query=mysqli_query($con,"select sum(total) from scart where client='$client' and pid='$id'");
      if(mysqli_num_rows($query))
      {
        while($row=mysqli_fetch_array($query))
        {
          echo "Total : ".$row[0];
        }
      }
      else
        echo "Total : 0";
      
    }

  if(isset($_POST['resetsale']))
  {
    $client=$_SESSION['client'];
    $query=mysqli_query($con,"delete from scart where client='$client'");
    if($query)
    {
      echo "<script>
        alert('Table is Resetted');
      </script>";
    }else
    echo "failed";
  }
	if(isset($_POST['dsale']))
	{	
		$date=$_POST['date'];
		$formatdate=Date("Y-m-d",strtotime($date));
		$query=mysqli_query($con,"select * from sale where date='$formatdate'");
		 if(mysqli_num_rows($query)>0)
        {
echo "<table class='wow fadeInUp' >
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
                                          <tr  style='background-color:#8828E7;color:white'>
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
                                          </table>
                                          <br>
                                          <br>
                                          ";
                                          $sr=1;
                                          echo "<table class='wow fadeInUp'>
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
		else
		{
			echo "<p class='text text-danger text-xsm' style='color:#5a08a3;font-size:30px;'>No Record found</p>";
		}


	}


?>