<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UjianModel;
use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    public function index()
    {
        $model = new SiswaModel();
        $modelUjian = new UjianModel();
        $modelPeserta = new PesertaModel();
        $siswa = $model->findAll();
        $ujian = $modelUjian->findAll();
        $peserta = $modelPeserta->findAll();

        $data = [
            'title' => 'Data Peserta',
            'active' => 'peserta',
            'siswa' => $siswa,
            'ujian' => $ujian,
            'peserta' => $peserta,
        ];
        return view('pages/data-peserta/index', $data);
    }

    public function add()
    {
        $id_ujian = $this->request->getPost('id_ujian');
        $peserta = $this->request->getPost('peserta');
        $keterangan = $this->request->getPost('keterangan');

        $modelPeserta = new PesertaModel();

        $userData = [
            'id_ujian' => $id_ujian,
            'peserta' => $peserta,
            'keterangan' => $keterangan,
        ];

        $modelPeserta->insert($userData);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->back();
    }

    public function update($id)
    {
        $modelPeserta = new PesertaModel();
        $peserta = $modelPeserta->find($id);

        if (!$peserta) {
            return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
        }

        $id_ujian = $this->request->getPost('id_ujian');
        $peserta = $this->request->getPost('peserta');
        $keterangan = $this->request->getPost('keterangan');

        $userData = [
            'id_ujian' => $id_ujian,
            'peserta' => $peserta,
            'keterangan' => $keterangan,
        ];

         $modelPeserta->update($id, $userData);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->back();
    }

    public function delete($nis)
    {
        $peserta = new PesertaModel();
        $dataPeserta = $peserta->find($nis);
        if ($dataPeserta) {
            $peserta->delete($nis);

            session()->setFlashdata('success', 'Data berhasil dihapus.');
        }
        return redirect()->back();
    }
}
