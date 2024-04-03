<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inspection;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Inspection::whereDate('start', '>=', $request->start)
                            ->whereDate('end','<=', $request->end)
                            ->get(['id', 'title', 'adress', 'start', 'end', 'nomLoca', 'numLoca', 'conform', 'etat']);
            return response()->json($data);
        }
        return view('inspections/calender');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $inspection = Inspection::create([
                    'title'     =>  $request->title,
                    'adress'    =>  $request->adress,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'nomLoca'   =>  $request->nomLoca,
                    'numLoca'   =>  $request->numLoca,
                    'conform'   =>  $request->conform,
                    'etat'      =>  $request->etat,
                ]);

                return response()->json($inspection);
            }

            if($request->type == 'update')
            {
                $inspection = Inspection::find($request->id)->update([
                    'title'     =>  $request->title,
                    'adress'    =>  $request->adress,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'nomLoca'   =>  $request->nomLoca,
                    'numLoca'   =>  $request->numLoca,
                    'conform'   =>  $request->conform,
                    'etat'      =>  $request->etat,
                ]);

                return response()->json($inspection);
            }

            if($request->type == 'delete')
            {
                $inspection = Inspection::find($request->id)->delete();

                return response()->json($inspection);
            }
        }
    }
}
