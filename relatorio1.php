<?php


include('relatorioGeral.php');



$pdf = new PDF();//'L','mm',array(50,80);
$pdf->AddPage();//'L','letter',0
$pdf->AliasNbPages();//números de páginas
$pdf->SetFont('Arial','B',18);
$pdf->Cell(120,12, utf8_decode('Relatório 1'),0,1,'R');
//$pdf->Cell(120,12, 'Relatórios em PDF',0,1,'C');

$pdf->SetFont('Arial', '', 12);

for($i =1; $i<=80; $i++){
	$pdf->Cell(120,12, 'Cadastre-se na nossa escola de Tecnologia',0,1);
}


$pdf->Output();//'D', 'RelatorioTeste.pdf'