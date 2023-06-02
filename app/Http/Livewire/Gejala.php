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
        "Terdapat warna kecoklatan atau keunguan pada daun, tangkai, buah, dan batang",
        "Tanaman mengeluarkan bau busuk",
        "Muncul bercak hitam konsektrik",
        "Bercak kecil hingga bercak membesar muncul pada daun dan buah",
        "Serangan terjadi pada daun atau buah yang masih muda",
        "Teradapat bercak berair pada daun atau buah yang masih muda",
        "Tanaman roboh",
        "Beberapa daun layu secara mendadak",
        "Layu pada cuaca panas di siang hari dan segar kembali di pagi dan sore hari",
        "Tanaman perlahan layu hingga mengering",
        "Pada batang terbentuk akar adventif",
        "Tanaman layu",
        "Pada batang terjadi pembentukan miselium / jamur berwarna putih",
        "Daun menguning",
        "Sisi atas daun terdapat bercak kuning",
        "Sisi bawah tampak bercak ungu kehijauan",
        "Daun mengering",
        "Pangkal batang mengecil",
        "Akar membusuk",
        "Pangkal batang membusuk",
        "Daun membentuk mosaik berwarna hijau muda dan hijau tua dengan bercak menguning",
        "Daun muda berkerut dan keriting",
        "Tanaman kerdil",
        "Akar serabut tidak normal dan terdapat bulatan kecil seperti bisul berwarna putih",
        "Daun tanaman terdapat bercak putih",
        "Terdapat larva di bagian tepi daun",
        "Ujung ranting terdapat tusukan berwarna coklat",
        "Pucuk tanaman kering",
        "Bunga layu dan menghitam",
        "Buah busuk dan terdapat larva",
        "Buah berlubang",
        "Buah rontok",
        "Terdapat bercak putih pada daun",
        "Daun berlubang",
        "Terdapat bekas gigitan di permukaan daun",
        "Pangkal batang terdapat bekas gigitan",
        "Terdapat ulat menggulung di sekitar tanaman",
        "Tanaman roboh",
        "Bercak (Alternaria solani Sor.)",
        "Cekik (Phytium ultimum)",
        "Tomato Mosaic Virus (TMV)",
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

    public $cfValues = [
        "P1" => [
            "G1" => ["mb" => 0.8, "md" => 0],
            "G2" => ["mb" => 0.4, "md" => 0.2],
            "G3" => ["mb" => 0.6, "md" => 0.2]
        ],
        "P2" => [
            "G3" => ["mb" => 0.8, "md" => 0.2],
            "G4" => ["mb" => 0.6, "md" => 0.2],
            "G5" => ["mb" => 0.6, "md" => 0.6]
        ],
        "P3" => [
            "G2" => ["mb" => 1, "md" => 0.2],
            "G6" => ["mb" => 0.4, "md" => 0.6],
            "G7" => ["mb" => 0.8, "md" => 0.4]
        ],
        "P4" => [
            "G8" => ["mb" => 1, "md" => 0.2],
            "G9" => ["mb" => 0.8, "md" => 0.4],
            "G10" => ["mb" => 0.6, "md" => 0.2],
            "G11" => ["mb" => 0.6, "md" => 0.4]
        ],
        "P5" => [
            "G11" => ["mb" => 0.6, "md" => 0.2],
            "G12" => ["mb" => 0.8, "md" => 0.2],
            "G13" => ["mb" => 1, "md" => 0.2],
            "G14" => ["mb" => 0.6, "md" => 0.4]
        ],
        "P6" => [
            "G15" => ["mb" => 0.8, "md" => 0.2],
            "G16" => ["mb" => 0.8, "md" => 0.2],
            "G17" => ["mb" => 0.6, "md" => 0.4]
        ],
        "P7" => [
            "G12" => ["mb" => 0.8, "md" => 0.4],
            "G18" => ["mb" => 0.8, "md" => 0.6],
            "G19" => ["mb" => 0.6, "md" => 0.2],
            "G20" => ["mb" => 0.8, "md" => 0.2]
        ],
        "P8" => [
            "G21" => ["mb" => 1, "md" => 0.2],
            "G22" => ["mb" => 0.8, "md" => 0.2],
            "G23" => ["mb" => 0.6, "md" => 0.4]
        ],
        "P9" => [
            "G7" => ["mb" => 0.4, "md" => 0.6],
            "G12" => ["mb" => 0.4, "md" => 0.8],
            "G23" => ["mb" => 1, "md" => 0.2],
            "G24" => ["mb" => 1, "md" => 0.2]
        ]
    ];

    public $rules = [
        "R1" => ["G1", "G2", "G3"],
        "R2" => ["G3", "G4", "G5"],
        "R3" => ["G2", "G6", "G7"],
        "R4" => ["G8", "G9", "G10", "G11"],
        "R5" => ["G11", "G12", "G13", "G14"],
        "R6" => ["G15", "G16", "G17"],
        "R7" => ["G12", "G18", "G19", "G20"],
        "R8" => ["G21", "G22", "G23"],
        "R9" => ["G7", "G12", "G23", "G24"]
        ];

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


        for ($i = 0; $i < $totalModals; $i++) {
            $this->gejalaModal[$i] = false;
            $this->kondisiModal[$i] = false;
        }


        $latest = $totalModals;
        $this->gejalaModal[$latest] = false;
        $this->kondisiModal[$latest] = false;
        $this->diagnosa[] = [$this->selectedGejala[count($this->diagnosa)], $this->selectedKondisi[count($this->diagnosa)]];
    }

    public function removeDiagnosa($index)
    {

        unset($this->diagnosa[$index]);


        $this->diagnosa = array_values($this->diagnosa);


        unset($this->selectedGejala[$index]);
        unset($this->selectedKondisi[$index]);


        $this->selectedGejala = array_values($this->selectedGejala);
        $this->selectedKondisi = array_values($this->selectedKondisi);


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

    public function diagnose()
    {
        $result = $this->calculateDiagnosis();

        $this->toggleSuccessModal();
    }

    private function calculateDiagnosis()
    {

        $totalModals = count($this->gejalaModal);
        $diagnosis = [];
        $maxCF = 0;
        $result = '';

        for ($i = 0; $i < $totalModals; $i++) {
            $gejala = $this->selectedGejala[$i];
            $kondisi = $this->selectedKondisi[$i];

            if (!empty($gejala) && !empty($kondisi)) {
                $penyakit = $this->findPenyakitByGejala($gejala);
                $cfValue = $this->cfValues[$penyakit][$gejala];

                if (!isset($diagnosis[$penyakit])) {
                    $diagnosis[$penyakit] = $cfValue['mb'];
                } else {
                    $diagnosis[$penyakit] = $this->combineCF($diagnosis[$penyakit], $cfValue);
                }

                if ($diagnosis[$penyakit] > $maxCF) {
                    $maxCF = $diagnosis[$penyakit];
                    $result = $penyakit;
                }
            }
        }

        return $result;
    }

    private function findPenyakitByGejala($gejala)
    {
        $dataDiagnosa = [
            "G1" => "P1",
            "G2" => "P3",
            "G3" => "P1",
            "G4" => "P2",
            "G5" => "P2",
            "G6" => "P3",
            "G7" => "P3",
            "G8" => "P4",
            "G9" => "P4",
            "G10" => "P4",
            "G11" => "P4",
            "G12" => "P5",
            "G13" => "P5",
            "G14" => "P5",
            "G15" => "P6",
            "G16" => "P6",
            "G17" => "P6",
            "G18" => "P7",
            "G19" => "P7",
            "G20" => "P7",
            "G21" => "P8",
            "G22" => "P8",
            "G23" => "P8",
            "G24" => "P9"
            ];

        return $dataDiagnosa[$gejala];
    }

    private function combineCF($cf1, $cf2)
    {

        $mb1 = $cf1['mb'];
        $md1 = $cf1['md'];
        $mb2 = $cf2['mb'];
        $md2 = $cf2['md'];

        $mb = $mb1 * $mb2;
        $md = $md1 + ($md2 * (1 - $md1));

        return ['mb' => $mb, 'md' => $md];
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
