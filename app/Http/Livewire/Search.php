<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

// use Illuminate\Database\Eloquent\Collection;

class Search extends Component
{
    public string $query = 'rien';
    // use WithPagination;
    
    public function updatedQuery($query)
    {
        
    }
    public function render()
    {
        return view('livewire.search',['articles' => Article::orderBy('created_at', 'desc')->where('code','like','%'.$this->query.'%')->paginate(20)]);
    }
}
