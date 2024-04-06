<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournee;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tournee::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('tournees.calender');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $tournee = Tournee::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($tournee);
            }

            if ($request->type == 'update') {
                $tournee = Tournee::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($tournee);
            }

            if ($request->type == 'delete') {
                $tournee = Tournee::find($request->id)->delete();

                return response()->json($tournee);
            }
        }
    }
}