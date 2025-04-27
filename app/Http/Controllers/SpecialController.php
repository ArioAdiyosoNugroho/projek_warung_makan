<?php
namespace App\Http\Controllers;

use App\Models\Special;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $specials = Special::all();
        return view('setting.menus.specials.index', compact('specials','menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('setting.menus.specials.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => [
                'required',
                'exists:menus,id',
                function ($attribute, $value, $fail) {
                    if (Special::where('menu_id', $value)->exists()) {
                        $fail('Menu spesial sudah di tambahkan,silahkan pilih menu yang lain.');
                    }
                },
            ],
            'description' => 'required|string',
        ]);

        Special::create([
            'menu_id' => $request->menu_id,
            'description' => $request->description,
        ]);

        return redirect()->route('specials.index')->with('success', 'Special created successfully.');
    }

    public function edit(Special $special)
    {
        $menus = Menu::all();
        return view('setting.menus.specials.edit', compact('special','menus'));
    }

    public function update(Request $request, Special $special)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'description' => 'required|string',
        ]);

        $special->update([
            'menu_id' => $request->menu_id,
            'description' => $request->description,
        ]);

        return redirect()->route('specials.index')->with('success', 'Special updated successfully.');
    }

    public function show(Special $special)
    {
        return view('setting.menus.specials.show', compact('special'));
    }

    public function destroy(Special $special)
    {
        if ($special->image) {
            Storage::disk('public')->delete($special->image);
        }
        $special->delete();

        return redirect()->route('specials.index')->with('success', 'Special deleted successfully.');
    }
}