<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;

class Like extends Component
{
    public $comment;

    public function like()
    {
        // dd('feri naghola');
        $this->comment->like();
    }

    public function dislike()
    {
        // dd('feri naghola');
        $this->comment->dislike();
    }

    public function render()
    {
        return view('livewire.comments.like');
    }
}
