<?php

namespace App\Http\Controllers\Homestay;

use App\Models\User;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomestayController extends Controller
{
    function index()
    {
        $homestay = Homestay::where('user_id', Auth::user()->id)->get();
        return view('homestay.dashboard', compact('homestay'));
    }

    function create()
    {
        $homestayCount = Homestay::where('user_id', Auth::user()->id)->count();

        return view('homestay.create-homestay', compact('homestayCount'));
    }

    function show($id)
    {
        $homestay = Homestay::findOrFail($id);
        return view('homestay.homestay-details', compact('homestay'));
    }


    function store(Request $request)
    {
        //dd($request->all());

        $homestayCount = Homestay::where('user_id', Auth::user()->id)->count();

        if ($homestayCount > 0) {
            return redirect()->back()->with('error', 'Sorry! You can add only one homestay at this moment');
        }
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Allow only image files
        ]);

        // Handle file upload
        $coverPhotoPath = $request->file('cover_photo')->store('homestays', 'public');
        $validatedData['cover_photo'] = $coverPhotoPath;
        $validatedData['user_id'] = Auth::user()->id;

        // Create a new Homestay
        // Homestay::create([
        //     'name' => $validatedData['name'],
        //     'description' => $validatedData['description'],
        //     'phone' => $validatedData['phone'],
        //     'email' => $validatedData['email'],
        //     'address' => $validatedData['address'],
        //     'cover_photo' => $coverPhotoPath,
        //     'user_id' => Auth::user()->id, // Ensure the user is authenticated
        // ]);

        Homestay::create($validatedData);

        return redirect()->back()->with('success', 'Homestay created successfully!');
    }

    public function edit($id)
    {
        $homestay = Homestay::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('homestay.edit-homestay', compact('homestay'));
    }

    public function update(Request $request, $id)
    {
        $homestay = Homestay::where('id', $id)
            ->where('user_id', Auth::id()) // Ensure the user owns the homestay
            ->firstOrFail();

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional logo upload
        ]);

        // Handle the logo upload if provided
        if ($request->hasFile('cover_photo')) {
            $validated['cover_photo'] = $request->file('cover_photo')->store('homestays', 'public');
        }

        // Update the homestay
        $homestay->update($validated);

        return redirect()->route('homestay.dashboard')->with('success', 'Homestay updated successfully.');
    }


    function inquiry()
    {
        return view('homestay.inquiry');
    }
}
