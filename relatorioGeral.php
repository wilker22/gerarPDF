<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
	function header()
	{
		$this->AddLink();
		$this->Image('img/logo2.jpg',1,1,55,0,'','www.wilker.com');
		
		$this->SetFont('Arial', 'B', 18);
		$this->Cell(80);
		$this->Cell(30,10,'Wilker',0,1,'C');
		
		$this->SetFont('Arial', 'B', 14);
		$this->Cell(80);
		$this->Cell(30,10,utf8_decode('Anaslista de Tecnologia da Informação'),0,1,'C');
		$this->Ln(10); 

	}
	
	function footer()
	{
		$this->SetY(-18);
		
		$this->SetFont('Arial', 'I', 12);
		$this->AddLink();
		$this->Cell(5, 10, 'www.wilker.com', 0, 0, 'L');
		
		$this->SetFont('Arial', 'I', 10);
		$this->Cell(0,10, utf8_decode('Página ') . $this->PageNo() . 'de {nb}',0,0,'C');
		
		
		
		
	}
	
	
}
