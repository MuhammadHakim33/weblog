<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SubscriberTable extends Component
{
    public $search;

    public function render()
    {
        $authors = User::with(['userRole', 'post'])
                    ->whereRelation('userRole', 'level', 'subscriber')
                    ->where('name', 'like', '%'.$this->search.'%')
                    ->get();

        $count = $authors->count();

        return view('livewire.subscriber-table', [
            'subscribers' => $authors,
            'count' => $count,
        ]);
    }
}
