<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_mahasiswa');
        $this->load->helper('api_helper');
    }

    public function index()
    {
        $this->load->view('mahasiswa/index');
    }

    public function get()
    {
        $data = $this->model_mahasiswa->getAll();
        
        response($data);
    }

    public function save()
    {
        $input = parse_input(['nim', 'nama', 'alamat']);

        $this->model_mahasiswa->save($input);

        response(['message' => 'Data mahasiswa berhasil ditambahkan'], 201);
    }

    public function update($id)
    {
        $input = parse_input(['nim', 'nama', 'alamat']);

        $this->model_mahasiswa->update($input, $id);

        response(['message' => 'Data mahasiswa berhasil diperbaharui'], 200);
    }

}