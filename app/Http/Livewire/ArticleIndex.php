<?php

// namespace App\Http\Livewire;

// use App\Models\Article;
// use Livewire\Component;

// class ArticleIndex extends Component
// {
//     public  $by = "created_at";
//     public  $direction = 'desc';

//     public function updatedBy()
//     {
//         dd($this->by);
//     }
//     // public function mount($by,$direction)
//     // {
//     //     // $this->by = $by;
//     //     $this->direction = $direction;
//     // }
//     public function render()
//     {
//         return view('livewire.article-index',['articles' => Article::orderBy($this->by,$this->direction)->paginate(20)]);
//     }
// }
