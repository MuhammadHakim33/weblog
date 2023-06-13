<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        Gate::authorize('admin');
        
        $authors = User::with(['userRole', 'post'])
                    ->whereRelation('userRole', 'level', 'subscriber')
                    ->get();

        $count = $authors->count();

        return view('operator.subscribers.index', [
            'title' => 'Subscribers',
            'subscribers' => $authors,
            'count' => $count,
        ]);
    }

    public function email()
    {
        Gate::authorize('admin');

        return view('operator.subscribers.send', [
            'title' => 'Subscribers'
        ]);
    }

    public function send(Request $request)
    {
        Gate::authorize('admin');

        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'receiver' => 'required'
        ]);
        
        $subscribers = User::with(['userRole', 'post'])
                    ->whereRelation('userRole', 'level', 'subscriber')
                    ->get();

        if($request->receiver != 'all') {
            Mail::to($request->receiver)->send(new NewsletterMail($request));
            return redirect('subscribers')->with('status-success', 'Send Newsletter Success!');
        }
        
        foreach($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterMail($request));
        }
        
        return redirect('subscribers')->with('status-success', 'Send Newsletter Success!');
    }
}