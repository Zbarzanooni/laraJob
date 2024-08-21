<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataTablesController extends Controller
{
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Listing::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('deadline', function ($data){
                    $time = new Carbon($data['deadline']);
                    return $time->diff(Carbon::now())->format('%y سال')  ;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href='. route('edit.post.job', $row->id).' class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        $data = Listing::all();
//        return DataTables::of($data)
//            ->addIndexColumn()
//            ->addColumn('action', function ($row) {
//                $actionBtn = '<a href="javascript:void(0)"
//                  class="edit btn btn-success btn-sm">Edit</a>
//                  <a href="javascript:void(0)"
//                  class="delete btn btn-danger btn-sm">Delete
//                  </a>';
//                return $actionBtn;
//            })
//            ->rawColumns(['action'])
//            ->make(true);
    }
}
