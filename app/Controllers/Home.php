<?php

namespace App\Controllers;
use App\Models\SiswaModel;
use App\Models\UjianModel;
use App\Models\PesertaModel;
use App\Models\MatpelModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new SiswaModel();
        $modelUjian = new UjianModel();
        $modelPeserta = new PesertaModel();
        $modelMatpel = new MatpelModel();
        $siswa = $model->findAll();
        $ujian = $modelUjian->findAll();
        $peserta = $modelPeserta->findAll();
        $matpel = $modelMatpel->findAll();

        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'siswa' => $siswa,
            'ujian' => $ujian,
            'peserta' => $peserta,
            'matpel' => $matpel,
        ];

        return view('index', $data);
    }

    public function fibo(): string
    {
        $data = [
            'title' => 'Fibonacci',
            'active' => 'fibo-1'
        ];

        return view('fibonacci', $data);
    }

    public function fibonacci()
    {
        $input = $this->request->getVar('input');

        if (!is_numeric($input) || $input < 0) {
            return "Input harus berupa angka positif.";
        }

        $fibonacciSeries = $this->generateFibonacci($input);

        echo implode(', ', $fibonacciSeries);
    }

    private function generateFibonacci($n)
    {
        $fibonacciSeries = [];

        for ($i = 0; $i <= $n; $i++) {
            if ($i <= 1) {
                $fibonacciSeries[] = $i;
            } else {
                $fibonacciSeries[] = $fibonacciSeries[$i - 1] + $fibonacciSeries[$i - 2];
            }
        }

        return $fibonacciSeries;
    }


}
