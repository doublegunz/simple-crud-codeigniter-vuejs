<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_mahasiswa');
    }

    public function index()
    {
        $this->load->view('mahasiswa/index');
    }

    public function get()
    {
        $mahasiswa = $this->model_mahasiswa->getAll();
        
        echo json_encode($mahasiswa);
    }

}