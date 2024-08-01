<?php 

$pdf = new Pdf('P', 'mm', 'A6', true, 'UTF-8', false);
$pdf->SetTitle('Facture');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();


$data['donnees_facture'] = $donnees_facture;
$html = $this->load->view('vente/print_page_test', $data, true);
$pdf->Write(5, $html);
$pdf->Output('invoce.pdf', 'I');
?>


<!-- <h1>Recu facture</h1> -->