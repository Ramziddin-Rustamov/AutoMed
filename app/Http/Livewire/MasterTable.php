<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class MasterTable extends Component
{

    public $masters;
    public $name;
    public $number;
    public $earn;
    public $date;
    public $services;


    public function mount()
    {
        $this->masters = User::where('job', 'master')->get();
    }

    public function updatedname($name)
    {
        $this->masters = User::where('job', 'master')->where('name', 'like', '%' . $name . '%')->get();
    }
    public function updateddate($date)
    {
        $this->masters = User::where('job', 'master')->where('created_at', 'like', '%' . $date . '%')->get();
    }

    public function removeMaster($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        redirect()->to('/home');
    }

    public function render()
    {
        return view('livewire.master-table');
    }
}
