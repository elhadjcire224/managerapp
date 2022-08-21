<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserCard extends Component
{
    public $user;


    public function addAdmin()
    {
        // dd($this->user);
        if($this->user->admin){
            $user = User::find($this->user->id)->update(['adminn' => false]);
            dd($user);
        }else{
            $user = User::find($this->user->id);
            dd($user->update(['admin' => true]));
        }
    }
    public function render()
    {
        return view('livewire.user-card');
    }
}
