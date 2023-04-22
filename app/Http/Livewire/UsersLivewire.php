<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class UsersLivewire extends Component
{

    public $users;
    public $frontUser;

    public function mount()
    {
        $previousUsers = User::all();
        $this->users = $previousUsers;
    }

    public function deleteUser($user)
    {
        // $this->users->prepend($this->users);
        // dd($user);
        $findedUser = User::find($user);
        $this->users = $this->users->where('id', '!=', $user);
        Alert::success('Muvaffaqiyatli', $this->$findedUser . ' o`chirildi  !');
        $findedUser->delete();
    }
    public function render()
    {
        return view('livewire.users-livewire');
    }
}
