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
        $data['from'] = substr(filter_var($_POST['from'], FILTER_SANITIZE_STRING), 5, 2);
        $data['to'] = substr(filter_var($_POST['to'], FILTER_SANITIZE_STRING), 5, 2);
        $data['center_id'] = filter_var($_POST['center_name'], FILTER_SANITIZE_STRING);
        $data['district_id'] = filter_var($_POST['district'], FILTER_SANITIZE_STRING);
        $data['month_id'] = filter_var($_POST['month'], FILTER_SANITIZE_STRING);
        $data['crop_type'] = filter_var($_POST['cropType'], FILTER_SANITIZE_STRING);
        $data['crop_varient'] = filter_var($_POST['cropVart'], FILTER_SANITIZE_STRING);

        $this->createReport($data);

    }
    public function createReport($data)
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
