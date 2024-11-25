<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    function index()
    {
        $data['message_count'] = Message::count();
        $data['new_homestay'] = Homestay::where('status', 'pending')->count();
        return view('admin.dashboard', compact('data'));
    }

    function homestay()
    {
        $homestays = Homestay::orderByRaw("
            CASE 
                WHEN status = 'pending' THEN 1
                WHEN status = 'approved' THEN 2
                WHEN status = 'rejected' THEN 3
                ELSE 4
            END
            ")->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.homestay-list', compact('homestays'));
    }

    function editHomestay($id)
    {
        $homestay = Homestay::where('id', $id)->firstOrFail();
        return view('admin.edit-homestay', compact('homestay'));
    }

    function updateHomestay(Request $request, $id)
    {

        $homestay = Homestay::where('id', $id)
            ->firstOrFail();

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional logo upload
        ]);

        // Handle the logo upload if provided
        if ($request->hasFile('cover_photo')) {
            $validated['cover_photo'] = $request->file('cover_photo')->store('homestays', 'public');
        }

        // Update the homestay
        $homestay->update($validated);

        return redirect()->route('admin.homestay.show')->with('success', 'Homestay updated successfully.');
    }
}
