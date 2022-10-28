<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class Comentarios extends Component
{   
    public $post;
    public $comentario;
   

    protected $rules = [
        'comentario' => 'required|max:255',
    ];

    /* Hook de livewire */
    public function updated()
    {
        $this->validateOnly($this->comentario);
    }

    public function store()
    {   
        $this->validate();

        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' =>  $this->comentario,
        ]);

        $this->comentario = '';
    }

    public function render()
    {
        $comentarios = $this->post->comentarios;
        return view('livewire.comentarios' , compact('comentarios'));
    }
}
