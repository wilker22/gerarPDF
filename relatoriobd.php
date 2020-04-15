<?php

include('relatorioGeral.php');
include('relatoriosbd/conbd.php');


$idCat = $_GET['idCat'];

$sqlProdutos = "SELECT p.CodigoP, p.NombreP, p.Precio, c.IdCategoria 
				FROM productos AS p 
				INNER JOIN categorias AS c 
				ON p.IdCategoria = c.IdCategoria 
				WHERE c.IdCategoria = ". $idCat . "";
				
	$resultProdutos = $con->query($sqlProdutos);
	//echo $sqlProdutos; die();
	 

$pdf = new PDF('L', 'mm', 'A4');//'L','mm',array(50,80);
$pdf->AddPage();//'L','letter',0
$pdf->AliasNbPages();//números de páginas
$pdf->SetFont('Arial','B',18);
$pdf->Cell(250,12, utf8_decode('LISTA DE PRODUTOS'),0,1,'C');
$pdf->Ln(10);
//$pdf->Cell(120,12, 'Relatórios em PDF',0,1,'C');



//cabeçalho da tabela
$pdf->setFillColor(232,232,230);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(30,12, utf8_decode('CÓDIGO'),1,0,'C', 1);
$pdf->Cell(200,12, utf8_decode('PRODUTO'),1,0,'C', 1);
$pdf->Cell(30,12, utf8_decode('PREÇO'),1,1,'C', 1);


//corpo da tabela
$pdf->SetFont('Arial', '', 12);
while($registro = $resultProdutos->fetch_array(MYSQLI_BOTH)){
	$pdf->Cell(30,12, $registro['CodigoP'],1,0,'L');
	$pdf->Cell(200,12, $registro[utf8_decode('NombreP')],1,0,'L');
	$pdf->Cell(30,12, $registro['Precio'],1,1,'R');
}


$pdf->Output();//'D', 'RelatorioTeste.pdf'