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
        $data = array();
        $from = substr(filter_var($_POST['from'], FILTER_SANITIZE_STRING), 5, 2);
        $to = substr(filter_var($_POST['to'], FILTER_SANITIZE_STRING), 5, 2);
        $data['reportType'] = filter_var($_POST['reportType'], FILTER_SANITIZE_STRING);

        if($data['reportType'] == 'userInfo'){
            $data['result'] = "SELECT role, COUNT(first_name) as cnt FROM user GROUP BY role";
            $data['header'] = "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='ra_hms' AND `TABLE_NAME`='user'and `COLUMN_NAME` in ('role','cnt')";
        }
        if($data['reportType'] == 'cropInfo'){
            $data['result'] = "SELECT harvest_per_land, harvest_period, crop_varient FROM crop";
            $data['header'] = "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='ra_hms' AND `TABLE_NAME`='crop'and `COLUMN_NAME` in ('harvest_per_land','harvest_period', 'crop_varient')";
        }
        if($data['reportType'] == 'dmgInfo'){
            $data['result'] = "SELECT damage_reason,damage_area FROM crop_damage";
            $data['header'] = "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='ra_hms' AND `TABLE_NAME`='crop_damage'and `COLUMN_NAME` in ('damage_area','damage_reason')";
        }
        if($data['reportType'] == 'hvstInfo'){
            $data['result'] = "SELECT expected_harvest, crop_id FROM harvest WHERE starting_month_id >= $from AND harvesting_month_id <= $to";
            $data['header'] = "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='ra_hms' AND `TABLE_NAME`='harvest'and `COLUMN_NAME` in ('expected_harvest','crop_id')";
        }

        $this->createReport($data);

    }
    public function createReport($data)
    {
        // $database = new Database();
        // $result = $this->model->runQuery("SELECT harvest_period, crop_type, crop_varient  FROM crop");
        $result = $this->model->runQuery($data['result']);
        $header = $this->model->runQuery($data['header']);
        // $header = $this->model->runQuery("SELECT 'Harvest Period', 'Crop Type', 'Crop Varient' FROM information_schema.columns WHERE 'SELECT harvest_period, crop_type, crop_varient FROM crop' in('harvet_period' ,'crop_type', 'crop_varient')");
        
        require('libs/fpdf/fpdf.php');
        $pdf = new FPDF('p', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);

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
