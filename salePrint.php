<?php 
    include 'connection.php';
    $id=$_GET['order_id'];

 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    td,th{
      
          word-break: break-all;

      }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>
<body>
                  <div id="data">
                           
    <div class="invoice-box" id="alif">
        <table cellpadding="0" cellspacing="0">
            <tr class="">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $id?><br>
                                <?php
                                        $date;
                                    $query=mysqli_query($con,"select * from sale where order_id='$id'");
                                    while ($row=mysqli_fetch_array($query)) {
                                            $date=$row['date'];
                                    }
                                    $dateAsUnixTimestamp = strtotime($date);
                                    echo date('M',$dateAsUnixTimestamp);
                                    echo " ";
                                    echo date('d',$dateAsUnixTimestamp);
                                    echo ", ";
                                    echo date('Y',$dateAsUnixTimestamp);
                                    
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                Glowing Neon Industry<br>
                                Pakkah Garrah Sialkot<br>
                                qasim.ali3460@gmail.com
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </table>
                </td>
                <td>
                                <?php
                                    $name;
                                    $address;
                                    $pid;
                                    $qu=mysqli_query($con,"select * from sale where order_id='$id'");
                                    while($row=mysqli_fetch_array($qu))
                                        $pid=$row["p_id"];

                                    $query=mysqli_query($con,"select * from customer where cid='$pid'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        $name=$row['name'];
                                        $address=$row['address'];
                                        $email=$row['email'];
                                         echo "

                                         ".$name."<br>
                                         ".$email."<br>
                                         ";
                                    }
                                ?>
                            </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Detail
                </td>
                <td>
                    Quantity
                </td>
                <td>
                    price
                </td>
                <td>
                    Total
                </td>
            </tr>
            <?php
                $query=mysqli_query($con,"select * from sale where order_id='$id'");
                if(mysqli_num_rows($query))
                {
                    while($row=mysqli_fetch_array($query))
                    {
                        $detail=$row['detail'];
                        $qt=$row['quantity'];
                        $pt=$row['price'];
                        echo "
                            <tr class='item'>
                                <td>
                                    ".$detail."
                                </td>
                                <td>
                                    ".$qt."
                                </td>
                                <td>
                                    ".$pt."
                                </td>
                                <td>
                                    ".$qt*$pt."
                                </td>
                            </tr>
                        ";
                    }
                }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td >
                   <b>Extra:</b>
                </td>

                <td>
                    <?php
                        $query=mysqli_query($con,"select sum(extra) from sale where order_id='$id'");
                        while($row=mysqli_fetch_array($query))
                            echo $row[0];

                    ?>
                 </td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td>
                   <b>Total:</b>
                </td>
                <td>
                    <?php
                        $query=mysqli_query($con,"select * from sale where order_id='$id'");
                        while($row=mysqli_fetch_array($query))
                            {
                                echo $row['total'];
                                break;
                            }
                    ?></td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                
                <td>
                   <b>Payment:</b>
                </td>
                <td>
                    <?php
                        $query=mysqli_query($con,"select * from sale where order_id='$id'");
                        while($row=mysqli_fetch_array($query))
                        {
                            echo $row['payment'];
                            break;
                        }
                    ?></td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td>
                   <b>Remaainings:</b>
                </td>
                <td><?php
                        $query=mysqli_query($con,"select * from sale where order_id='$id'");
                        while($row=mysqli_fetch_array($query))
                        {
                            echo $row['remaining'];
                            break;
                        }
                    ?></td>
            </tr>
        </table>
    </div>

    </div>
                        
 <script type="text/javascript">
       $(document).ready(function(){
             // var divToPrint=document.getElementById("data");
             //   newWin= window.open("");
             //   newWin.document.write(divToPrint.outerHTML);
             //   newWin.print();
             //   newWin.close();
               window.print();
               window.close();
         
        });

   </script>
	</body>
</html