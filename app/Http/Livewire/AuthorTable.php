<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AuthorTable extends Component
{
    public $search;

    public function render()
    {
        $authors = User::with(['userRole', 'post'])
                    ->whereRelation('userRole', 'level', 'author')
                    ->where('name', 'like', '%'.$this->search.'%')
                    ->withCount('post')
                    ->get();

        $count = $authors->count();

        return view('livewire.author-table', [
            'authors' => $authors,
            'count' => $count,
        ]);
    }
}
