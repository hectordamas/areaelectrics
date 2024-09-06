<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        $message->update([
            'is_read' => true
        ]);

        return view('admin.messages.show', compact('message'));
    }
}
