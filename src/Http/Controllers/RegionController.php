<?php

namespace Bunker\TourismBooking\Http\Controllers;

use App\Http\Controllers\Controller;
use Bunker\TourismBooking\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RegionController extends Controller
{
    public function index(): Factory|View|Application
    {
        $regions = Region::all();
        return view('tourism-booking::regions.index', compact('regions'));
    }

    public function create(): Factory|View|Application
    {
        return view('tourism-booking::regions.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'thumbnail' => 'required|file',
        ]);
        Region::where('id', 1)->update([
            'name' => $request->name,
            'thumbnail' => $request->thumbnail,
        ]);
        return redirect()->route('tourism-booking::regions.index');
    }

    public function edit($id): Factory|View|Application
    {
        $region = Region::findOrFail($id);
        return view('tourism-booking::regions.edit', compact('region'));
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'thumbnail' => 'required|file',
        ]);
        Region::where('id', 1)->update([
            'name' => $request->name,
            'thumbnail' => $request->thumbnail,
        ]);
        return redirect()->route('tourism-booking::regions.index');
    }
}
