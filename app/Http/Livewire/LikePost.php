<?php

namespace App\Http\Livewire;

use Livewire\Component;


/* No request */

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $counterLike;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->counterLike =  $this->post->likes()->count();
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->counterLike =  $this->post->likes()->count();
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isLiked = true;
            $this->counterLike =  $this->post->likes()->count();
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
