<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class DraftTable extends Component
{
    use WithPagination;

    public $search;
    public $order = 'created_at';

    public function render()
    {
        $posts = Post::with('user')
                ->where('status', 'draf')
                ->where('user_id', auth()->id())
                ->where('title', 'like', '%'.$this->search.'%')
                ->orderBy($this->order, 'desc')
                ->paginate(10);

        $count = $posts->total();

        return view('livewire.draft-table', [
            'posts' => $posts,
            'count' => $count
        ]);
    }
}
