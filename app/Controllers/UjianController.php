<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UjianModel;
use App\Models\MatpelModel;

class UjianController extends BaseController
{
    public function index()
    {
        $model = new UjianModel();
        $modelMatpel = new MatpelModel();
        $ujian = $model->findAll();
        $matpel = $modelMatpel->findAll();

        $data = [
            'title' => 'Data Ujian',
            'active' => 'ujian',
            'ujian' => $ujian,
            'matpel' => $matpel,
        ];
        return view('pages/data-ujian/index', $data);
    }

    public function add()
    {
        $nama_ujian = $this->request->getPost('nama_ujian');
        $id_matpel = $this->request->getPost('id_matpel');
        $tanggal = $this->request->getPost('tanggal');

        $ujian = new UjianModel();

        $userData = [
            'nama_ujian' => $nama_ujian,
            'id_matpel' => $id_matpel,
            'tanggal' => $tanggal,
        ];

        $ujian->insert($userData);
        session()->setFlashdata('success', 'Data ujian berhasil ditambahkan.');
        return redirect()->back();
    }

    public function update($id)
    {
        $modelUjian = new UjianModel();
        $ujian = $modelUjian->find($id);

        if (!$ujian) {
            return redirect()->back()->with('error', 'Data ujian tidak ditemukan.');
        }

        $nama_ujian = $this->request->getPost('nama_ujian');
        $id_matpel = $this->request->getPost('id_matpel');
        $tanggal = $this->request->getPost('tanggal');

        $userData = [
            'nama_ujian' => $nama_ujian,
            'id_matpel' => $id_matpel,
            'tanggal' => $tanggal,
        ];

        $modelUjian->update($id, $userData);
        session()->setFlashdata('success', 'Data ujian berhasil diupdate.');
        return redirect()->back();
    }


    // public function filter()
    // {
    //     $model = new UjianModel();

    //     $start_date = $this->request->getGet('start_date');
    //     $end_date = $this->request->getGet('end_date');

    //     $ujian = $model->getUjianByDateRange($start_date, $end_date);

    //     return redirect()->to('data-ujian')->with('ujian', $ujian);
    // }


    public function delete($id)
    {
        $ujian = new UjianModel();
        $dataUjian = $ujian->find($id);
        if ($dataUjian) {
            $ujian->delete($id);

            session()->setFlashdata('success', 'Data ujian berhasil dihapus.');
        }
        return redirect()->back();
    }
}
