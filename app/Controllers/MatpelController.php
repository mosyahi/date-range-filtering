<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatpelModel;

class MatpelController extends BaseController
{
    public function index()
    {
        $model = new MatpelModel();
        $matpel = $model->findAll();
        $data = [
            'title' => 'Mata Pelajaran',
            'active' => 'matpel',
            'matpel' => $matpel,
        ];
        return view('pages/mata-pelajaran/index', $data);
    }

    public function add()
    {
        $nama_matpel = $this->request->getPost('nama_matpel');

        $matpel = new MatpelModel();

        $userData = [
            'nama_matpel' => $nama_matpel,
        ];

        $cekData = $matpel->where('nama_matpel', $userData['nama_matpel'])
        ->countAllResults();

        if ($cekData > 0) {
            return redirect()->back()->withInput()->with('error', 'Mata pelajaran tersebut sudah ada dalam database.');
        }

        $matpel->insert($userData);
        session()->setFlashdata('success', 'Data mata pelajaran berhasil ditambahkan.');
        return redirect()->back();
    }

    public function update($id)
    {
        $modelMatpel = new MatpelModel();
        $matpel = $modelMatpel->find($id);

        if (!$matpel) {
            return redirect()->back()->with('error', 'Data mata pelajaran tidak ditemukan.');
        }

        $nama_matpel = $this->request->getPost('nama_matpel');

        $cekData = $modelMatpel->where('nama_matpel', $nama_matpel)->where('id_matpel !=', $id)->countAllResults();

        if ($cekData > 0) {
            return redirect()->back()->withInput()->with('error', 'Nama mata pelajaran tersebut sudah ada dalam database.');
        }

        $userData = [
            'nama_matpel' => $nama_matpel,
        ];

        if ($matpel['nama_matpel'] == $nama_matpel) {
            return redirect()->back()->with('warning', 'Tidak ada perubahan yang dilakukan pada data mata pelajaran.');
        }

        $modelMatpel->update($id, $userData);
        session()->setFlashdata('success', 'Data mata pelajaran berhasil diupdate.');
        return redirect()->back();
    }


    public function delete($id)
    {
        $matpel = new MatpelModel();
        $dataMatpel = $matpel->find($id);
        if ($dataMatpel) {
            $matpel->delete($id);

            session()->setFlashdata('success', 'Data mata pelajaran berhasil dihapus.');
        }
        return redirect()->back();
    }
}
