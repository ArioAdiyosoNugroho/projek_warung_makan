<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::latest()->first(); // Ambil data terbaru dari database
        return view('setting.setabout', compact('about')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
            'description' => 'required'
        ]);

        // Upload gambar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        About::create([
            'image' => $imageName,
            'video_url' => $request->video_url,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Data About berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
            'description' => 'required'
        ]);

        $about = About::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            // Hapus gambar lama jika ada
            if ($about->image && file_exists(public_path('uploads/'.$about->image))) {
                unlink(public_path('uploads/'.$about->image));
            }

            $about->image = $imageName;
        }

        $about->video_url = $request->video_url;
        $about->description = $request->description;
        $about->save();

        return redirect()->back()->with('success', 'Data About berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
}
