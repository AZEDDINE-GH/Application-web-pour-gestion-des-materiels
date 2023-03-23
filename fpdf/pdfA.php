<?php 
	require "fpdf.php";
	$pdo = new PDO("mysql:host=localhost;dbname=gestion_cri","root", "");
	class myPDF extends FPDF{
		function header(){
			$this->Image('CRI.jpg',50,-30 );
			$this->SetFont('Arial','B',20);
			$this->Cell(276,90,'Liste Des Afectation',50,0,'C');
			$this->Ln();
			$this->SetFont('Times','',12);
			$this->Cell(276,-70,date("Y-m-d"),0,0,'C');
			$this->Ln(-25);
		}
		function footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		function headerTable(){
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,'Id',1,0,'C');
			$this->Cell(40,10,'Utilisateur',1,0,'C');
			$this->Cell(40,10,'Designation',1,0,'C');
			$this->Cell(40,10,'marque',1,0,'C');
			$this->Cell(30,10,'Quantite',1,0,'C');
			$this->Cell(25,10,'QuantiteEnv',1,0,'C');
			$this->Ln();
		}
		function viewTable($pdo){
			$this->SetFont('Times','',12);
			$stmt = $pdo->query('select * from affecter');
			while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
				$this->Cell(20,10,$data->Id,1,0,'C');
				$this->Cell(40,10,$data->Utilisateur,1,0,'C');
				$this->Cell(40,10,$data->Designation,1,0,'C');
				$this->Cell(40,10,$data->marque,1,0,'C');
				$this->Cell(30,10,$data->Quantite,1,0,'C');
				$this->Cell(25,10,$data->QuantiteEnv,1,0,'C');
				$this->Ln();
			}
		}
	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	$pdf->SetLeftMargin(55);
	$pdf->headerTable();
	$pdf->viewTable($pdo);
	$pdf->Output();
 