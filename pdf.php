<?php

	session_start();

    require('fpdf181/fpdf.php');

    // Instanciation of inherited class
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $br_racuna = rand(100000, 999999);

    $pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(230,230,0);
    $pdf->SetTextColor(220,50,50);
    $pdf->SetX(0);
    $pdf->SetY(0);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,10,'Br racuna: ',0);
    $pdf->SetX(25);
    $pdf->Cell(10,10, $br_racuna, 0);
    $pdf->Ln(20);
    
    $pdf->SetFont('Arial','',20);
    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->Cell(30,10,'Racun',0,0,'C');
    // Line break
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(100,7,'Naziv',1);
    $pdf->Cell(20,7,'Cena',1);
    $pdf->Cell(20,7,'Kolicina',1);
    $pdf->Cell(20,7,'Ukupno',1);

    $pdf->Ln(10);
    $pdf->SetFont('Times','',8);
    $pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(230,230,0);
    $pdf->SetTextColor(220,50,50);


    $konekcija = mysqli_connect("localhost", "root", "", "si2");
    $total = 0;

    foreach(array_keys($_SESSION["korpa"]) as $element)
    {
        $niz = $konekcija->query("SELECT Naziv, Cena FROM proizvodi WHERE Barcode = '$element'")->fetch_all(MYSQLI_ASSOC);
        $total += $niz[0]["Cena"]*$_SESSION["korpa"][$element];

        $pdf->Cell(100, 7, $niz[0]["Naziv"], 1);
        $pdf->Cell(20, 7, $niz[0]["Cena"], 1);
        $pdf->Cell(20, 7, $_SESSION["korpa"][$element], 1);
        $pdf->Cell(20, 7, $niz[0]["Cena"]*$_SESSION["korpa"][$element], 1);

        $pdf->Ln(10);
        unset($niz);
    }

    $pdf->Cell(100, 7, '', 0);
    $pdf->Cell(20, 7, '', 0);
    $pdf->Cell(20, 7, '', 0);
    $pdf->Cell(20, 7, "TOTAL", 1);
    $pdf->Cell(17, 7, $total, 1);

    foreach(array_keys($_SESSION["korpa"]) as $element)
    {
        unset($_SESSION["korpa"][$element]);
    }

    $pdf->Output('F', 'racuni/'.$br_racuna.'.pdf');
    echo '<script> window.location.href = "prikaz.php?Tip=proizvodi"</script>';
?>