<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);



$date = date("Y-m-d");
$time = date("H:i:s");

require('./PDFLibrary/fpdf.php');

$pdf = new FPDF('P','mm',"A4");
$pdf -> AddPage();

$pdf -> SetFont('Arial','B',20);


$pdf->cell(194,10,'Assign Tasks',0,1,'C');

$pdf -> SetFont('Arial','',15);


$pdf->cell(40,30,'',0,0);
$pdf->cell(40,30,'',0,1);

$pdf->cell(40,10,'Genarated date: ',0,0);
$pdf->cell(40,10,$date,0,1);


$pdf->cell(40,10,'Genarated time: ',0,0);
$pdf->cell(40,10,$time,0,1);


$pdf->cell(40,30,'',0,0);
$pdf->cell(40,30,'',0,1);

$pdf -> SetFont('Arial','B',12);

$pdf->cell(39,10,'Eid ',1,0,'C' );
$pdf->cell(39,10,'Tid ',1,0,'C' );
$pdf->cell(39,10,'Dateassign',1,0,'C' );
$pdf->cell(39,10,'Acivityid',1,0,'C' );
$pdf->cell(39,10,'Remarks',1,1,'C');

$pdf -> SetFont('Arial','',12);

$query = "SELECT * FROM assign";
$result = mysqli_query($conn,$query);
if( mysqli_num_rows($result)>0 ){
    while($data = mysqli_fetch_assoc($result)){ 
   
        $pdf->cell(39,10,$data['Eid'],1,0,'C');
        $pdf->cell(39,10,$data['Tid'],1,0,'C');
        $pdf->cell(39,10,$data['Dateassign'],1,0,'C');
        $pdf->cell(39,10,$data['Acivityid'],1,0,'C');
        $pdf->cell(39,10,$data['Remarks'],1,1,'C');
            
            

        
    }
}
    

$pdf -> Output();

?>