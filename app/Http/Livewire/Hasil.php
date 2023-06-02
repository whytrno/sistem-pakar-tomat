<?php

namespace App\Http\Livewire;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Hasil extends Component
{
    public $deleteModal = false;
    public $hasilDiagnosa = [];
    public $detailModal = false;
    public $selectedDiagnosa = 0;

    public function setSelectedDiagnosa($id)
    {
        $this->selectedDiagnosa = $id;
    }
    public function deleteDataProcess()
    {
        History::where('id', $this->selectedDiagnosa)->delete();

        $this->toggleDeleteModal();
    }
    public function deleteData($id)
    {
        $this->setSelectedDiagnosa($id);
        $this->deleteDataProcess();
    }
    public function toggleDeleteModal()
    {
        $this->deleteModal = !$this->deleteModal;
    }
    public function toggleDetailModal($id)
    {
        $this->selectedDiagnosa = $id;
        $this->detailModal = !$this->detailModal;
    }

    public function render()
    {
        $this->hasilDiagnosa = [];
        $hasilDiagnosa = History::where('user_id', Auth::user()->id)->get();
        ;

        foreach ($hasilDiagnosa as $diagnosa) {
            $userInput = json_decode($diagnosa->user_input, true);
            $hasilPrediksi = json_decode($diagnosa->hasil_prediksi, true);

            $data = [
                "id" => $diagnosa->id,
                "user_input" => $userInput,
                "hasil_prediksi" => $hasilPrediksi,
                "hasil_penyakit" => $diagnosa->hasil_penyakit,
                "akurasi" => $diagnosa->akurasi,
                "created_at" => $diagnosa->created_at,
                "updated_at" => $diagnosa->updated_at
            ];

            array_push($this->hasilDiagnosa, $data);
        }

        // dd($this->hasilDiagnosa);

        return view('livewire.hasil');
    }
}