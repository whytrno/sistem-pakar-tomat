<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Penyakit extends Component
{
    public $deleteModal = false;
    public $datas = Penyakit::all();

    public function toggleDeleteModal()
    {
        $this->deleteModal = !$this->deleteModal;
    }

    public function render()
    {
        return view('livewire.admin.penyakit');
    }
}