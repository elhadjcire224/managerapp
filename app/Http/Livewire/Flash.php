<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    public $colors = [
        'error' => 'border-red-700 bg-red-200 text-red-700',
        'sucess' => 'border-green-700 bg-green-200 text-green-700'
    ];
    protected $listeners = ['Flash' => 'setFlashMessage'];
    public function setFlashMessage($message,$type)
    {
        $this->message = $message;
        $this->type = $type;
        $this->dispatchBrowserEvent('flash-message');

    }
    public function render()
    {
        // dump($this->colors[$this->type]?? '');
        return view('livewire.flash');
    }
}
