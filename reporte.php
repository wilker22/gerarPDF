<?php

require('fpdf/fpdf.php');

$pdf = new FPDF();//'L','mm',array(50,80);
$pdf->AddPage();//'L','letter',0
$pdf->SetFont('Arial','B',18);
$pdf->Cell(120,12, 'Hello World','B',1,'R');
$pdf->Cell(120,12, 'Relatórios em PDF',0,1,'C');

$pdf->Output();//'D', 'RelatorioTeste.pdf'