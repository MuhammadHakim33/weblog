<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class PostTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $query = Post::with('user')
                ->where('status', '!=', 'draf')
                ->where('title', 'like', '%'.$this->search.'%');

        if (!Gate::allows('admin')) {
            $query->where('user_id', auth()->id());
        }
    
        $posts = $query->latest()->paginate(10);

        $count = $posts->total();

        return view('livewire.post-table', [
            'posts' => $posts,
            'count' => $count
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
