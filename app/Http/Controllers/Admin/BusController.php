<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::withCount('seats')->get();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|max:20|unique:buses',
            'bus_type' => 'required|string|max:50',
            'total_seats' => 'required|integer|min:1',
            'amenities' => 'nullable|string',
        ]);

        Bus::create($request->all());

        return redirect()->route('admin.buses.index')->with('success', 'Xe đã được thêm thành công');
    }

    public function show(Bus $bus)
    {
        $seats = $bus->seats()->orderBy('seat_number')->get();
        return view('admin.buses.show', compact('bus', 'seats'));
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'license_plate' => 'required|string|max:20|unique:buses,license_plate,'.$bus->bus_id.',bus_id',
            'bus_type' => 'required|string|max:50',
            'total_seats' => 'required|integer|min:1',
            'amenities' => 'nullable|string',
        ]);

        $bus->update($request->all());

        return redirect()->route('admin.buses.index')->with('success', 'Thông tin xe đã được cập nhật');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('admin.buses.index')->with('success', 'Xe đã được xóa');
    }

    public function toggleStatus(Bus $bus)
    {
        $bus->update(['is_active' => !$bus->is_active]);
        return back()->with('success', 'Trạng thái xe đã được cập nhật');
    }
}