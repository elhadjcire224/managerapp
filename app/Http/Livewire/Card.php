<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;

class Card extends Component
{
    public $article;

    public function addLike()
    {
        if(auth()->check()){
            auth()->user()->likes()->toggle($this->article->id);
        }else{
            $this->emit("Flash","Merci de vous connecter pour pouvoir liker ou telecharger","error");
        }
        
    }
    public function render()
    {
        return view('livewire.card');
    }
}
