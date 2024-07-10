<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        return view('machines.index');
    }

    public function filter(Request $request)
    {
        $query = Machine::query();

        if ($request->filled('mesin_id')) {
            $query->where('mesin_id', 'like', '%' . $request->mesin_id . '%');
        }

        if ($request->filled('site')) {
            $query->where('site', 'like', '%' . $request->site . '%');
        }

        if ($request->filled('month')) {
            $query->where('month', 'like', '%' . $request->month . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->status . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('operator')) {
            $query->where('operator', 'like', '%' . $request->operator . '%');
        }

        return response()->json($query->get());
    }
}
