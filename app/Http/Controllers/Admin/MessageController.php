<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.messages', compact('messages'));
    }

    public function show($id)
    {
        // Find the message by its ID or fail if not found
        $message = Message::findOrFail($id);

        // Pass the message to the view
        return view('admin.view-message', compact('message'));
    }

    public function destroy($id)
    {
        // Find the message by its ID
        $message = Message::findOrFail($id);

        // Delete the message
        $message->delete();

        // Redirect back with a success message
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
