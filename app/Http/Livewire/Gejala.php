<?php

namespace App\Http\Livewire;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gejala extends Component
{
    public $diagnosa = [];
    public $searchGejala = '';
    public $searchKondisi = '';
    public $successModal = false;
    public $prediksiFinal = '';
    public $akurasi = 0;

    public $gejala = [
        "G1" => "Terdapat warna kecoklatan atau keunguan pada daun, tangkai, buah, dan batang",
        "G2" => "Tanaman mengeluarkan bau busuk",
        "G3" => "Muncul bercak hitam konsektrik",
        "G4" => "Bercak kecil hingga bercak membesar muncul pada daun dan buah",
        "G5" => "Serangan terjadi pada daun atau buah yang masih muda",
        "G6" => "Terdapat bercak berair pada daun atau buah yang masih muda",
        "G7" => "Tanaman roboh",
        "G8" => "Beberapa daun layu secara mendadak",
        "G9" => "Layu pada cuaca panas di siang hari dan segar kembali di pagi dan sore hari",
        "G10" => "Tanaman perlahan layu hingga mengering",
        "G11" => "Pada batang terbentuk akar adventif",
        "G12" => "Tanaman layu",
        "G13" => "Pada batang terjadi pembentukan miselium / jamur berwarna putih",
        "G14" => "Daun menguning",
        "G15" => "Sisi atas daun terdapat bercak kuning",
        "G16" => "Sisi bawah tampak bercak ungu kehijauan",
        "G17" => "Daun mengering",
        "G18" => "Pangkal batang mengecil",
        "G19" => "Akar membusuk",
        "G20" => "Pangkal batang membusuk",
        "G21" => "Daun membentuk mosaik berwarna hijau muda dan hijau tua dengan bercak menguning",
        "G22" => "Daun muda berkerut dan keriting",
        "G23" => "Tanaman kerdil",
        "G24" => "Akar serabut tidak normal dan terdapat bulatan kecil seperti bisul berwarna putih",
        "G25" => "Daun tanaman terdapat bercak putih",
        "G26" => "Terdapat larva di bagian tepi daun",
        "G27" => "Ujung ranting terdapat tusukan berwarna coklat",
        "G28" => "Pucuk tanaman kering",
        "G29" => "Bunga layu dan menghitam",
        "G30" => "Buah busuk dan terdapat larva",
        "G31" => "Buah berlubang",
        "G32" => "Buah rontok",
        "G33" => "Terdapat bercak putih pada daun",
        "G34" => "Daun berlubang",
        "G35" => "Terdapat bekas gigitan di permukaan daun",
        "G36" => "Pangkal batang terdapat bekas gigitan",
        "G37" => "Terdapat ulat menggulung di sekitar tanaman"
    ];

    public $penyakit = [
        "P1" => "Busuk (Phytophtora infestans de Barry)",
        "P2" => "Bercak (Alternaria solani Sor.)",
        "P3" => "Busuk Lunak Bakteri / Busuk Batang (Erwinia carotovora (L.R. Jones ) Hollander / Bacillus carotovora)",
        "P4" => "Layu Bakteri (Pseudomonas / Rolstonia Solanacearum (E.F. Smith.) E.F. Sm)",
        "P5" => "Layu Fusarium (Fusarium Oxysporum (Schlecht.) f.sp. lycopersici (Sacc.) Snyd.et Hans)",
        "P6" => "Kapang Daun (Fulvia Fuva (Cke.) Cif)",
        "P7" => "Cekik (Phytium ultimu)",
        "P8" => "Tomato Mozaik Virus (TMV)",
        "P9" => "Nematoda Akar (Heterodera marioni/ Meloidogyne javanice)",
        "P10" => "Penggerek Daun (Liriomyza sative Blancard (Diptera : Asgromyzidae))",
        "P11" => "Kepik Tomat (Nesidiocoris (Crytopeltis) tenuis (Hemiptera : Miridae))",
        "P12" => "Lalat Buah (Bactocera cucurbitae (Coquillet) (Diptera : Tephritidae))",
        "P13" => "Ulat Grayak (Spodoptera liture F.)",
        "P14" => "Ulat Tanah (Agrotis ipsilon)"
    ];

    public $kondisi = [
        [
            'Sangat Yakin',
            1
        ],
        [
            'Yakin',
            0.8
        ],
        [
            'Cukup Yakin',
            0.6
        ],
        [
            'Sedikit Yakin',
            0.4
        ],
        [
            'Tidak Yakin',
            0.2
        ],
        [
            'Tidak',
            0
        ]
    ];


    public $rumusPenyakit = [
        "P1" => [
            "gejala" => [
                "G1",
                "G2",
                "G3"
            ]
        ],
        "P2" => [
            "gejala" => [
                "G3",
                "G4",
                "G5"
            ]
        ],
        "P3" => [
            "gejala" => [
                "G2",
                "G6",
                "G7"
            ]
        ],
        "P4" => [
            "gejala" => [
                "G8",
                "G9",
                "G10",
                "G11"
            ]
        ],
        "P5" => [
            "gejala" => [
                "G11",
                "G12",
                "G13",
                "G14"
            ]
        ],
        "P6" => [
            "gejala" => [
                "G15",
                "G16",
                "G17"
            ]
        ],
        "P7" => [
            "gejala" => [
                "G12",
                "G18",
                "G19",
                "G20"
            ]
        ],
        "P8" => [
            "gejala" => [
                "G21",
                "G22",
                "G23"
            ]
        ],
        "P9" => [
            "gejala" => [
                "G7",
                "G12",
                "G23",
                "G24"
            ]
        ],
        "P10" => [
            "gejala" => [
                "G17",
                "G25",
                "G26"
            ]
        ],
        "P11" => [
            "gejala" => [
                "G27",
                "G28",
                "G29",
                "G30"
            ]
        ],
        "P12" => [
            "gejala" => [
                "G31",
                "G32"
            ]
        ],
        "P13" => [
            "gejala" => [
                "G31",
                "G33",
                "G34"
            ]
        ],
        "P14" => [
            "gejala" => [
                "G35",
                "G36",
                "G37"
            ]
        ]
    ];

    public $inputUser = [
        "gejala" => [],
        "gejala_name" => [],
        "kondisi" => []
    ];
    // 2, 0.2, 0.8

    public $prediksiPenyakit = [];

    public $gejalaModal = [];
    public $kondisiModal = [];
    public $selectedGejala = [];
    public $userGejalaInput = [];
    public $userGejalaNameInput = [];
    public $userKondisiInput = [];
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
            $kunci = array_search($content, $this->gejala);

            $this->selectedGejala[$index] = $content;
            $this->userGejalaInput[$index] = $kunci;
            $this->userGejalaNameInput[$index] = $content;
        } else if ($type == 'kondisi') {
            $kunci = array_search($content, array_column($this->kondisi, 0));

            $this->selectedKondisi[$index] = $content;
            $this->userKondisiInput[$index] = $this->kondisi[$kunci][1];
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

    public function hitungPrediksi()
    {
        foreach ($this->rumusPenyakit as $kodePenyakit => $rumus) {

            $gejalaRumus = $rumus['gejala'];
            $inputGejala = $this->inputUser['gejala'];
            $kondisiGejala = $this->inputUser['kondisi'];

            $isMatch = array_intersect($gejalaRumus, $inputGejala);

            if (!empty($isMatch)) {
                $totalKondisi = 0;
                foreach ($isMatch as $gejala) {
                    $index = array_search($gejala, $inputGejala);
                    $totalKondisi += floatval($kondisiGejala[$index]);
                }

                $this->prediksiPenyakit[$kodePenyakit] = [
                    "gejala" => $isMatch,
                    "kondisi" => $totalKondisi
                ];
            }
        }

        $prediksiFinalKey = 0;
        $maxKondisi = 0;

        foreach ($this->prediksiPenyakit as $kodePenyakit => $prediksi) {
            $kondisi = $prediksi['kondisi'];

            if ($kondisi > $maxKondisi) {
                $prediksiFinalKey = $kodePenyakit;
                $maxKondisi = $kondisi;
            }
        }

        if ($prediksiFinalKey != 0) {
            $this->prediksiFinal = $this->penyakit[$prediksiFinalKey];
        }

        $countInput = count($this->inputUser["gejala"]);
        $countPrediksi = count($this->prediksiPenyakit);

        $this->akurasi = ($countInput / $countPrediksi) * 100;

        // return $this->prediksiPenyakit;
        // return $prediksiFinal;
    }

    public function toggleSuccessModal()
    {
        for ($i = 0; $i < count($this->userGejalaInput); $i++) {
            array_push($this->inputUser["gejala"], $this->userGejalaInput[$i]);
            array_push($this->inputUser["gejala_name"], $this->userGejalaNameInput[$i]);
            array_push($this->inputUser["kondisi"], $this->userKondisiInput[$i]);
        }

        $this->hitungPrediksi();

        $data = [
            "user_id" => Auth::user()->id,
            "user_input" => json_encode($this->inputUser),
            "hasil_prediksi" => json_encode($this->prediksiPenyakit),
            "hasil_penyakit" => $this->prediksiFinal,
            "akurasi" => $this->akurasi
        ];

        History::create($data);

        // dd($this->hitungPrediksi());
        // dd($inputUser);
        // dd($this->userGejalaInput[0]);
        // dd($this->userGejalaInput);
        // dd($this->userKondisiInput);
        $this->successModal = !$this->successModal;
    }


    public function render()
    {

        // dd($akurasi);

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