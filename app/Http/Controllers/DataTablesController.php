<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataTablesController extends Controller
{
    public function data()
    {
        $model = Listing::get();
        return Datatables::of($model)->make(true);
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
