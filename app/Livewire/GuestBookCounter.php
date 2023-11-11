<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class GuestBookCounter extends Component
{
    public function render()
    {
        return view('livewire.guest-book-counter')
            ->with([
                'bookCount' => Book::count(),
                'saleCount' => Book::where('discounted_price', '!=', null)->count()
            ]);
    }
}
