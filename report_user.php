<?php

include("./includes/senz_database.php");

$conn = ControlDB::getconnect();
require_once './vendor/fpdf183/fpdf.php';

class PDF extends FPDF {

    // Page header
    function Header() {
        $this->Image("images/SenzAgro_Logo.png", 30, 15, 20);  // Logo
        $this->SetFont('Arial', 'B', 15); // Arial bold 15
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0, 77, 77); //font Color
        $this->Cell(277, 5, 'User Report (' . date('Y-m-d') . ')', 0, 1, 'C'); // Title
        $this->SetFont('Times', '', 13);
        $this->Cell(276, 10, 'User Details of SenzAgro (Pvt)Ltd.', 0, 0, 'C');
        // $this->SetTextColor(255 , 255, 51); //font Color
        $this->Ln(15); // Line break
    }

    // Page footer
    function Footer() {
        $this->SetY(-35); // Position at 3.0 cm from bottom
        $this->SetFont('Arial', 'I', 8); // Arial italic 8
        $this->Cell(60, 7, '............................................................', 0, 0, 'C');
        $this->Cell(155, 7, '', 0, 0, 'C'); // Page number
        $this->Cell(60, 7, '............................................................', 0, 1, 'C');
        $this->Cell(60, 7, 'Date', 0, 0, 'C');
        $this->Cell(155, 7, '', 0, 0, 'C');
        $this->Cell(60, 7, 'Name and Signature', 0, 1, 'C');
        $this->SetFont('Arial', 'I', 8); // Arial italic 8
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Page number
    }

    //body
    function TableHeader() {
        $this->SetFont('Arial', 'B', 12); // Poppins bold 15
        $this->SetFillColor(204, 230, 255); // Colors of frame, background and text
        $this->Cell(15, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(60, 10, 'NAME', 1, 0, 'C', true);
        $this->Cell(35, 10, 'DOB', 1, 0, 'C', true);
        $this->Cell(30, 10, 'NIC', 1, 0, 'C', true);
        $this->Cell(25, 10, 'GENDER', 1, 0, 'C', true);
        $this->Cell(50, 10, 'EMAIL', 1, 0, 'C', true);
        $this->Cell(30, 10, 'CONTACT NO', 1, 0, 'C', true);
        $this->Cell(35, 10, 'CONTACT NO', 1, 1, 'C', true);
    }

    function TableBody($conn) {
        $this->SetFont('Times', '', 12); //body font and size
        $this->SetFillColor(230, 243, 255); // Colors of frame, background and text
        $count_user = 1;
        $stmt = $conn->query("SELECT * FROM user");
        while ($row = $stmt->fetch_assoc()) {
            $this->Cell(15, 10, $count_user++, 1, 0, 'C', true);
            $this->Cell(60, 10, $row['user_fname'] . ' ' . $row['user_lname'], 1, 0, 'L', true);
            $this->Cell(35, 10, $row['user_dob'], 1, 0, 'C', true);
            $this->Cell(30, 10, $row['user_nic'], 1, 0, 'C', true);
            $this->Cell(25, 10, $row['user_gender'], 1, 0, 'C', true);
            $this->Cell(50, 10, $row['user_email'], 1, 0, 'L', true);
            $this->Cell(30, 10, $row['user_cno1'], 1, 0, 'C', true);
            $this->Cell(35, 10, $row['user_cno2'], 1, 1, 'C', true);
        }
    }

}

// Instanciation of inherited class
$pdf = new PDF('l', 'mm', 'A4'); //page setup size A4 orientation portrait
$pdf->SetTitle("User Report");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TableHeader();
$pdf->TableBody($conn);
// $pdf->SetAutoPageBreak('on', -35);
// ob_end_clean();
$pdf->Output();
// end