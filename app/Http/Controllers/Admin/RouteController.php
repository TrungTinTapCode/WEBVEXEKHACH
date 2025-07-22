<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RouteController extends Controller
{
    /**
     * Hiển thị danh sách các tuyến đường.
     */
    public function index()
    {
        // Lấy danh sách các tuyến đường
        $routes = Route::orderBy('id', 'desc')->get();

        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = 1;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('routes', 'public');
            $data['image'] = $imagePath;
        }

        Route::create($data);

        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được thêm thành công');
    }

    public function edit(Route $route)
    {
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($route->image) {
                Storage::disk('public')->delete($route->image);
            }
            
            $imagePath = $request->file('image')->store('routes', 'public');
            $data['image'] = $imagePath;
        }
            $data['is_active'] = $request->has('is_active') ? 1 : 0; 
        $route->update($data);

        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được cập nhật');
    }

    public function destroy(Route $route)
    {
        if ($route->image) {
            Storage::disk('public')->delete($route->image);
        }
        
        $route->delete();
        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được xóa');
    }

    public function toggleStatus(Route $route)
    {
        $route->update(['is_active' => !$route->is_active]);
        return back()->with('success', 'Trạng thái tuyến đường đã được cập nhật');
    }
}