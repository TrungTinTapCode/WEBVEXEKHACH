<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách chuyến xe, có thể lọc theo nơi đi, nơi đến, ngày đi...
        $query = Schedule::with(['bus']); 

        // Nếu có filter từ form, thêm điều kiện vào query
        if ($request->departure) {
            $query->where('start_station', 'like', '%' . $request->departure . '%');
        }
        if ($request->destination) {
            $query->where('end_station', 'like', '%' . $request->destination . '%');
        }
        if ($request->date) {
            $query->whereDate('start_time', $request->date);
        }

        $schedules = $query->get();

        return view('list', compact('schedules'));
    }
}