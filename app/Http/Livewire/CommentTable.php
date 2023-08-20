<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CommentTable extends Component
{
    use WithPagination;

    public function render()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);

        if (!Gate::allows('admin')) {   
            $comments = Comment::with('user', 'post')
                        ->whereHas('post', function (Builder $query) {
                            $query->where('user_id', auth()->id());
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }

        return view('livewire.comment-table', compact('comments'));
    }
}

