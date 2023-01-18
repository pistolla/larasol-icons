<?php

namespace App\Http\Controllers;

use App\Exports\FarmersExport;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Excel;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmers = (new Farmer())->newQuery();

        if (request()->has('search')) {
            $farmers->where('first_name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $farmers->orderBy($attribute, $sort_order);
        } else {
            $farmers->latest();
        }

        $farmers = $farmers->paginate(5)->onEachSide(2);

        return view('farmer.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportCSV() {
        $file_name = 'farmers_'.date('Y-m-d H:i:s').'.csv';
        return Excel::download(new FarmersExport, $file_name);
    }

    public function exportExcel() {
        $file_name = 'farmers_'.date('Y-m-d H:i:s').'.xlsx';
        return Excel::download(new FarmersExport, $file_name);
    }
}
