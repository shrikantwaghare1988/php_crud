<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
        $this->load->database();
		//$this->load->model('UserModel', 'um');

        header('Access-Control-Allow-Origin: *'); //--for cors error-----
    }

	public function index()
	{
        echo "Welcome to php";
		//$this->load->view('welcome_message');
	}
    public function test()
    {
        $this->load->library('phpexcel');
        //$this->load->library('PHPExcel/IOFactory.php');
		$xl_obj = new PHPExcel();
		$reader = PHPExcel_IOFactory::createReader('Excel2007');
		$reader->setReadDataOnly(true);
		$excel = $reader->load(FCPATH.'upload/excel_file/test.xlsx');
        //echo "All is fine";

		$sheet = $excel->getActiveSheet()->toArray(null,true,true,true);
		//pre($excel->getActiveSheet());die;
		//pre($sheet);die;
        $arrayCount = count($sheet); 
        for($i=2;$i<=$arrayCount;$i++)
        {                   
           // echo $sheet[$i]["A"].$sheet[$i]["B"].$sheet[$i]["C"];
        }
    }
	public function test2()
	{
		//---read multiple sheet-
		$this->load->library('phpexcel');
        //$this->load->library('PHPExcel/IOFactory.php');
		$xl_obj = new PHPExcel();
		$reader = PHPExcel_IOFactory::createReader('Excel2007');
		$reader->setReadDataOnly(true);
		$excel_Obj = $reader->load(FCPATH.'upload/excel_file/test_500.xlsx');

		//  Read sheet 0
		$worksheet=$excel_Obj->getSheet('0')->toArray(null,true,true,true);
		pre($worksheet);

	}
	public function test3()
	{
		$this->load->library('excel');

		$xl_obj = new PHPExcel();
		$reader = PHPExcel_IOFactory::createReader('Excel2007');
		$reader->setReadDataOnly(true);
		$excel = $reader->load(FCPATH.'upload/excel_file/test.xlsx');
        //echo "All is fine";

		$sheet = $excel->getActiveSheet()->toArray(null,true,true,true);
		//pre($excel->getActiveSheet());die;
		pre($sheet);die;

	}
	public function test4()
	{
		//---read data and save to table-
		$this->load->library('phpexcel');
        //$this->load->library('PHPExcel/IOFactory.php');
		$xl_obj = new PHPExcel();
		$reader = PHPExcel_IOFactory::createReader('Excel2007');
		$reader->setReadDataOnly(true);
		$excel_Obj = $reader->load(FCPATH.'upload/excel_file/test_500.xlsx');

		//  Read sheet 0
		$worksheet=$excel_Obj->getSheet('0');

		$colomncount = $worksheet->getHighestDataColumn();
		$rowcount = $worksheet->getHighestRow();
		$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);

		//pre($colomncount);
		//pre($rowcount);

		$insertquery='INSERT INTO `emp` (`first_name`, `last_name`,`gender`,`country`,`age`, `doj`) VALUES ';
		$subquery='';


		for($row=2; $row<= $rowcount - 1; $row++)
		{
			$subquery=$subquery.' (';
			for($col=1;$col<$colomncount_number;$col++)
			{
				$cell_value = $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
				
				if($col == 6)
				{					
					$date = str_replace('/', '-', $cell_value);
					$cell_value = date('Y-m-d', strtotime($date));
				}
				
				$subquery=$subquery.'\''.$cell_value.'\',';
			}
			$subquery = substr($subquery, 0, strlen($subquery) - 1);
			$subquery=$subquery.')'.' , ';
		}

		$insertquery=$insertquery.$subquery;
		$insertquery= substr($insertquery,0,strlen($insertquery)-2);

		
		if($this->db->query($insertquery))
		{
			echo "Total ".$rowcount." Records Saved Successfully";
		}

		//pre($insertquery);

	}

}
