<?php
namespace App\Http\Controllers;

use App\Models\WhyUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyUsController extends Controller
{
    public function index()
    {
        $whyus = WhyUs::all()->map(function ($item) {
            $words = explode(' ', $item->description);
            $item->short_description = implode(' ', array_slice($words, 0, 10)) . (count($words) > 10 ? '...' : '');
            return $item;
        });

        return view('setting.setwhyus', compact('whyus'));
    }

    public function create()
    {
        return view('setting.setwhyus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        WhyUs::create($request->all());
        return redirect()->route('setWhyUs')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = WhyUs::findOrFail($id);
        return view('setting.editwhyus', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $item = WhyUs::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('setWhyUs')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $item = WhyUs::findOrFail($id);
        $item->delete();
        return redirect()->route('setWhyUs')->with('success', 'Data berhasil dihapus!');
    }

    public function show($id)
    {
    $item = WhyUs::findOrFail($id); // Mengambil data berdasarkan ID
    return view('show.Rwhyus', compact('item')); // Mengirim data ke view
    }

}
