<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class SiswaController extends BaseController
{
    public function index()
    {
        $model = new SiswaModel();
        $siswa = $model->findAll();
        $data = [
            'title' => 'Data Siswa',
            'active' => 'siswa',
            'siswa' => $siswa,
        ];
        return view('pages/data-siswa/index', $data);
    }

    public function add()
    {
        $nama = $this->request->getPost('nama');
        $nis = $this->request->getPost('nis');
        $alamat = $this->request->getPost('alamat');

        $modelSiswa = new SiswaModel();

        $userData = [
            'nama' => $nama,
            'nis' => $nis,
            'alamat' => $alamat,
        ];

        $cekData = $modelSiswa->where('nis', $userData['nis'])
        ->countAllResults();

        if ($cekData > 0) {
            return redirect()->back()->withInput()->with('error', 'Nis tersebut sudah ada dalam database.');
        }

        $modelSiswa->insert($userData);
        session()->setFlashdata('success', 'Data siswa berhasil ditambahkan.');
        return redirect()->back();
    }

    public function update($nis)
    {
        $modelSiswa = new SiswaModel();
        $siswa = $modelSiswa->find($nis);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $nama = $this->request->getPost('nama');
        $nomorInduk = $this->request->getPost('nis');
        $alamat = $this->request->getPost('alamat');

        $cekData = $modelSiswa->where('nis', $nomorInduk)->where('nis !=', $nis)->countAllResults();

        if ($cekData > 0) {
            return redirect()->back()->withInput()->with('error', 'NIS tersebut sudah ada dalam database.');
        }

        $userData = [
            'nama' => $nama,
            'nis' => $nomorInduk,
            'alamat' => $alamat,
        ];

        if ($siswa['nis'] == $nomorInduk) {
            return redirect()->back()->with('warning', 'Tidak ada perubahan yang dilakukan pada data siswa ini.');
        }

        $modelSiswa->update($nis, $userData);
        session()->setFlashdata('success', 'Data siswa berhasil diupdate.');
        return redirect()->back();
    }

    public function delete($nis)
    {
        $siswa = new SiswaModel();
        $dataSiswa = $siswa->find($nis);
        if ($dataSiswa) {
            $siswa->delete($nis);

            session()->setFlashdata('success', 'Data siswa berhasil dihapus.');
        }
        return redirect()->back();
    }
}
