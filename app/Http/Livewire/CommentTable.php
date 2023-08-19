<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommentTable extends Component
{
    use WithPagination;

    public function render()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.comment-table', compact('comments'));
    }
}
