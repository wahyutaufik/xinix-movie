<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'third_party/fpdf/fpdf.php');

class xfpdf extends FPDF {
	
	function FancyTable($header, $data) {
    // Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','');
    // Header
		$w = array(40, 35, 40, 45);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
    // Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
    // Data
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			// $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			// $this->Cell($w[2],6,number_format(doubleval($row[2])),'LR',0,'R',$fill);
			// $this->Cell($w[3],6,number_format(doubleval($row[3])),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
    // Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}
?>