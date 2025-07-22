<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RouteController extends Controller
{
    /**
     * Hiển thị danh sách các tuyến đường.
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'desc')->get();
        return view('admin.routes.index', compact('routes'));
    }

    /**
     * Hiển thị form thêm tuyến đường mới.
     */
    public function create()
    {
        return view('admin.routes.create');
    }

    /**
     * Lưu tuyến đường mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price'     => 'required|numeric',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'departure', 'destination', 'price']);
        $data['is_active'] = 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('routes', 'public');
        }

        Route::create($data);

        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được thêm thành công');
    }

    /**
     * Hiển thị form chỉnh sửa tuyến đường.
     */
    public function edit(Route $route)
    {
        return view('admin.routes.edit', compact('route'));
    }

    /**
     * Cập nhật tuyến đường.
     */
    public function update(Request $request, Route $route)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price'     => 'required|numeric',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'start_point', 'end_point', 'price']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Xoá ảnh cũ nếu có
            if ($route->image) {
                Storage::disk('public')->delete($route->image);
            }

            $data['image'] = $request->file('image')->store('routes', 'public');
        }

        $route->update($data);

        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được cập nhật');
    }

    /**
     * Xoá tuyến đường.
     */
    public function destroy(Route $route)
    {
        if ($route->image) {
            Storage::disk('public')->delete($route->image);
        }

        $route->delete();

        return redirect()->route('admin.routes.index')->with('success', 'Tuyến đường đã được xóa');
    }

    /**
     * Đổi trạng thái hoạt động của tuyến đường.
     */
    public function toggleStatus(Route $route)
    {
        $route->update([
            'is_active' => !$route->is_active
        ]);

        return back()->with('success', 'Trạng thái tuyến đường đã được cập nhật');
    }
}
