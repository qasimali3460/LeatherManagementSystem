<?php
include 'connection.php';
session_start();

include_once("fpdf/fpdf.php");
class pdf extends FPDF{
	function Header(){
		$this->setFont("Arial","B",16);
		// $this->Cell(190,10,"This is Footer",0,1,"L");
		$this->image("img/logo.png",10,05,70);

	}
}
if (isset($_GET['order_id'])) {
	$oid=$_GET['order_id'];
	$pid;
	$name;
	$date;
	$dateb;
	$extra;
	$total;
	$payment;
	$remaining;
	$query=mysqli_query($con,"select * from purchase where order_id='$oid'");
	if(mysqli_num_rows($query))
	{
		while($row=mysqli_fetch_array($query))
		{
			$pid=$row['p_id'];
			$name=$row['name'];
			$dateb=$row['date'];
			$total=$row['total'];
			$payment=$row['payment'];
			$remaining=$row['remaining'];
			$query2=mysqli_query($con,"select sum(extra) from purchase where order_id='$oid'");
			while($row2=mysqli_fetch_array($query2))
				$extra=$row2[0];


			break;


		}
	}
                                  $dateAsUnixTimestamp = strtotime($dateb);
                                     $date=date('M',$dateAsUnixTimestamp)." ".date('d',$dateAsUnixTimestamp).", ".date('Y',$dateAsUnixTimestamp);












	$pdf = new pdf();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
	$pdf->Cell(190,10,"",0,1,"C");
	$pdf->Cell(190,10,"Supplier Slip",0,1,"C");
	
	$pdf->setFont("Arial",null,12);
	$pdf->Cell(50,10,"order_id",0,0);
	$pdf->Cell(50,10,": ".$oid,0,1);

	$pdf->Cell(50,10,"Supplier Name",0,0);
	$pdf->Cell(50,10,":".$name,0,1);

	

	$pdf->Cell(50,10,"Date",0,0);
	$pdf->Cell(50,10,": ".$date,0,1);

	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total (Rs)",1,1,"C");

	$query3=mysqli_query($con,"select * from purchase where order_id='$oid'");
	if(mysqli_num_rows($query3)>0)
	{
		$i=0;
		while($row3=mysqli_fetch_array($query3))
		{
				$pdf->Cell(10,10, ($i+1) ,1,0,"C");
				$pdf->Cell(70,10,$row3['detail'],1,0,"C");
				$pdf->Cell(30,10, $row3['quantity'],1,0,"C");
				$pdf->Cell(40,10, $row3['price'],1,0,"C");
				$pdf->Cell(40,10, $row3['quantity']*$row3['price'] ,1,1,"C");
					
				$i++;
		}
	}


	$pdf->Cell(50,10,"",0,1);

	$pdf->Cell(110,10,"",0,0);
	$pdf->Cell(50,10,"Extra",0,0);
	$pdf->Cell(50,10,": ".$extra,0,1);
	$pdf->Cell(110,10,"",0,0);
	$pdf->Cell(50,10,"Total",0,0);
	$pdf->Cell(50,10,": ".$total,0,1);
	$pdf->Cell(110,10,"",0,0);
	$pdf->Cell(50,10,"Payment",0,0);
	$pdf->Cell(50,10,": ".$payment,0,1);
	$pdf->Cell(110,10,"",0,0);
	$pdf->Cell(50,10,"Remaining",0,0);
	$pdf->Cell(50,10,": ".$remaining,0,1);
	$pdf->Cell(180,10,"Signature",0,0,"L");

	// $pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

	$pdf->Output();	

}


?>