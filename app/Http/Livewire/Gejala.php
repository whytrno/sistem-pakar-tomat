<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gejala extends Component
{
    public $diagnosa = [];
    public $searchGejala = '';
    public $searchKondisi = '';
    public $successModal = false;

    public $gejala = [
        "Tanaman roboh",
        "Bercak (Alternaria solani Sor.)",
        "Cekik (Phytium ultimu)",
        "Tomato Mozaik Virus (TMV)",
        "Ulat Tanah (Agrotis ipsilon)"
    ];

    public $kondisi = [
        "Sangat Yakin",
        "Yakin",
        "Cukup Yakin",
        "Sedikit Yakin",
        "Tidak Yakin"
    ];

    public $gejalaModal = [];
    public $kondisiModal = [];
    public $selectedGejala = [];
    public $selectedKondisi = [];

    public function mount()
    {
        $this->gejalaModal = array_fill(0, count($this->diagnosa) + 1, false);
        $this->kondisiModal = array_fill(0, count($this->diagnosa) + 1, false);
        $this->selectedGejala = array_fill(0, count($this->diagnosa) + 1, "Cari gejala ...");
        $this->selectedKondisi = array_fill(0, count($this->diagnosa) + 1, "Cari kondisi ...");
    }

    public function toggleModal($type, $index)
    {
        $totalModals = count($this->gejalaModal);

        if ($index >= 0 && $index < $totalModals) {
            if ($type == 'gejala') {
                $this->gejalaModal[$index] = isset($this->gejalaModal[$index]) ? !$this->gejalaModal[$index] : true;
                $this->kondisiModal[$index] = isset($this->kondisiModal[$index]) && false;
            } else if ($type == 'kondisi') {
                $this->kondisiModal[$index] = isset($this->kondisiModal[$index]) ? !$this->kondisiModal[$index] : true;
                $this->gejalaModal[$index] = isset($this->gejalaModal[$index]) && false;
            }
        }
    }

    public function changeSelected($type, $content, $index)
    {
        if ($type == 'gejala') {
            $this->selectedGejala[$index] = $content;
        } else if ($type == 'kondisi') {
            $this->selectedKondisi[$index] = $content;
        }
    }

    public function addDiagnosa()
    {
        $totalModals = count($this->gejalaModal);

        // Close all open modals
        for ($i = 0; $i < $totalModals; $i++) {
            $this->gejalaModal[$i] = false;
            $this->kondisiModal[$i] = false;
        }

        // Add new diagnosa
        $latest = $totalModals;
        $this->gejalaModal[$latest] = false;
        $this->kondisiModal[$latest] = false;
        $this->diagnosa[] = [$this->selectedGejala[count($this->diagnosa)], $this->selectedKondisi[count($this->diagnosa)]];
    }

    public function removeDiagnosa($index)
    {
        // Hapus diagnosa berdasarkan index yang diberikan
        unset($this->diagnosa[$index]);

        // Reset ulang array diagnosa agar indeksnya terurut secara berurutan
        $this->diagnosa = array_values($this->diagnosa);

        // Hapus elemen terkait pada array selectedGejala dan selectedKondisi
        unset($this->selectedGejala[$index]);
        unset($this->selectedKondisi[$index]);

        // Reset ulang array selectedGejala dan selectedKondisi agar indeksnya terurut secara berurutan
        $this->selectedGejala = array_values($this->selectedGejala);
        $this->selectedKondisi = array_values($this->selectedKondisi);

        // Tutup semua modal yang terbuka
        $totalModals = count($this->gejalaModal);
        for ($i = 0; $i < $totalModals; $i++) {
            $this->gejalaModal[$i] = false;
            $this->kondisiModal[$i] = false;
        }
    }

    public function toggleSuccessModal()
    {
        $this->successModal = !$this->successModal;
    }

    public function render()
    {
        $filteredGejala = [];
        $filteredKondisi = [];

        if (!empty($this->searchGejala)) {
            $filteredGejala = array_filter($this->gejala, function ($item) {
                return stripos($item, $this->searchGejala) !== false;
            });
        } else {
            $filteredGejala = $this->gejala;
        }

        if (!empty($this->searchKondisi)) {
            $filteredKondisi = array_filter($this->kondisi, function ($item) {
                return stripos($item, $this->searchKondisi) !== false;
            });
        } else {
            $filteredKondisi = $this->kondisi;
        }

        return view('livewire.gejala', [
            'filteredGejala' => $filteredGejala,
            'filteredKondisi' => $filteredKondisi,
        ]);
    }
}