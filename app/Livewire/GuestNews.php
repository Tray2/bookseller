<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class GuestNews extends Component
{
    public function render()
    {
        return view('livewire.guest-news')
            ->layout('components.layouts.app')
            ->with([
                'posts' => Post::latest()
                    ->paginate(5),
            ]);
    }
}
