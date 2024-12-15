<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardDisplay;

class DashboardController extends Controller
{
    public function index()
    {
        $displays = DashboardDisplay::all();

        return view('dashboard.index', compact('displays'));
    }
    public function update(Request $request, $id){
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'bg_url' => 'required|url',
        ]);

        $display = DashboardDisplay::findOrFail($id);
        $display->update($validated);

        return redirect()->route('dashboard')->with('success', 'Dashboard Berhasil Terupdate!');
    }

}
