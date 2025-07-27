<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request)
{
    // Lấy danh sách chuyến xe, kèm thông tin bus và route
    $query = Schedule::with(['bus', 'route']);

    // Nếu có filter từ form, thêm điều kiện vào query
    if ($request->departure) {
        $query->whereHas('route', function ($q) use ($request) {
            $q->where('departure', 'like', '%' . $request->departure . '%');
        });
    }

    if ($request->destination) {
        $query->whereHas('route', function ($q) use ($request) {
            $q->where('destination', 'like', '%' . $request->destination . '%');
        });
    }

    $schedules = $query->get();

    return view('list', compact('schedules'));
}
}