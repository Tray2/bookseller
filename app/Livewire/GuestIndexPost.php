<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class GuestIndexPost extends Component
{
    public function render()
    {
        return view('livewire.guest-index-post')
            ->with([
                'post' => Post::latest()->first(),
            ]);
    }
}
