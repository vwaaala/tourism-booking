<?php

namespace Bunker\TourismBooking\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Bunker\TourismBooking\Models\Region;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        // Middleware to ensure user authentication
        $this->middleware('auth');

        // Middleware to authorize access based on permissions for specific methods
        $this->middleware('permission:tb_region_show|tb_region_create|tb_region_edit|tb_region_delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:tb_region_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tb_region_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tb_region_delete', ['only' => ['destroy']]);
    }
    // index table
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    // create form
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('tourism_booking::regions.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('regions.index')->with('success', 'Created region :)');
    }

    // edit form
    public function edit(string $slug): Factory|View|Application
    {
        $region = Region::where('slug', $slug)->first();
        return view('tourism_booking::regions.edit', compact('region'));
    }

    // handle POST request for updating region
    public function update(Request $request, string $slug): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'thumbnail' => 'file|mimes:jpg,png,jpeg',
        ]);
        Region::where('slug', $slug)->update([
            'name' => $request->get('name')
        ]);

        return redirect()->route('regions.update')->with('success', 'Updated region info :)');
    }

    // delete from a POST request
    public function delete(Request $request): \Illuminate\Http\RedirectResponse
    {
        $region = Region::where('slug', $request->get('slug'))->first();
        return redirect()->route('regions.index')->with('success', 'Deleted region :)');
    }

}
