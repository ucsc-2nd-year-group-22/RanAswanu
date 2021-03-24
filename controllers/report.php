<?php

class Report extends Controller
{

    public function __construct()
    {

        parent::__construct();
        Session::init();
    }

    public function generateReport()
    {
        // $database = new Database();
        $result = $this->model->runQuery("SELECT harvest_period, crop_type, crop_varient  FROM crop");
        $header = $this->model->runQuery("SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='ra_hms' AND `TABLE_NAME`='crop'and `COLUMN_NAME` in ('harvest_period','crop_type','crop_varient')");

        require('libs/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // var_dump($header);

        foreach ($header as $heading) {
            foreach ($heading as $column_heading)
                $pdf->Cell(65, 12, $column_heading, 1);
        }
        foreach ($result as $row) {
            $pdf->Ln();
            foreach ($row as $column)
                $pdf->Cell(65, 12, $column, 1);
        }
        $pdf->Output();
    }
}
