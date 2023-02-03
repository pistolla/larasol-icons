<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFarmTypesRequest;
use App\Http\Requests\UpdateFarmTypesRequest;
use App\Models\FarmTypes;
use Exception;

class FarmTypesController extends Controller
{

    /**
     * Display a listing of the farm types.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $farmTypesObjects = FarmTypes::paginate(10);

        return view('farm_types.index', compact('farmTypesObjects'));
    }

    /**
     * Show the form for creating a new farm types.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('farm_types.create');
    }

    /**
     * Store a new farm types in the storage.
     *
     * @param App\Http\Requests\FarmTypesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(StoreFarmTypesRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmTypes::create($data);

            return redirect()->route('farm_types.farm_types.index')
                ->with('success_message', 'Farm Types was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified farm types.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $farmTypes = FarmTypes::findOrFail($id);

        return view('farm_types.show', compact('farmTypes'));
    }

    /**
     * Show the form for editing the specified farm types.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $farmTypes = FarmTypes::findOrFail($id);
        

        return view('farm_types.edit', compact('farmTypes'));
    }

    /**
     * Update the specified farm types in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\FarmTypesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, UpdateFarmTypesRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmTypes = FarmTypes::findOrFail($id);
            $farmTypes->update($data);

            return redirect()->route('farm_types.farm_types.index')
                ->with('success_message', 'Farm Types was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified farm types from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmTypes = FarmTypes::findOrFail($id);
            $farmTypes->delete();

            return redirect()->route('farm_types.farm_types.index')
                ->with('success_message', 'Farm Types was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
