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
    public $order = 'created_at';

    public function render()
    {
        $posts = Post::with('user')
                ->where('status', '!=', 'draf')
                ->where('title', 'like', '%'.$this->search.'%')
                ->orderBy($this->order, 'desc')
                ->paginate(10);

        if (!Gate::allows('admin')) {
            $posts = Post::with('user')
                    ->where('status', '!=', 'draf')
                    ->where('user_id', auth()->id())
                    ->where('title', 'like', '%'.$this->search.'%')
                    ->orderBy($this->order, 'desc')
                    ->paginate(10);
        }

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
