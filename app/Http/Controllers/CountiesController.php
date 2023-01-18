<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountiesFormRequest;
use App\Models\Counties;
use Exception;

class CountiesController extends Controller
{

    /**
     * Display a listing of the counties.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $countiesObjects = Counties::paginate(10);

        return view('counties.index', compact('countiesObjects'));
    }

    /**
     * Show the form for creating a new counties.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('counties.create');
    }

    /**
     * Store a new counties in the storage.
     *
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(CountiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Counties::create($data);

            return redirect()->route('counties.counties.index')
                ->with('success_message', 'Counties was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified counties.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $counties = Counties::findOrFail($id);

        return view('counties.show', compact('counties'));
    }

    /**
     * Show the form for editing the specified counties.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $counties = Counties::findOrFail($id);
        

        return view('counties.edit', compact('counties'));
    }

    /**
     * Update the specified counties in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, CountiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $counties = Counties::findOrFail($id);
            $counties->update($data);

            return redirect()->route('counties.counties.index')
                ->with('success_message', 'Counties was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified counties from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $counties = Counties::findOrFail($id);
            $counties->delete();

            return redirect()->route('counties.counties.index')
                ->with('success_message', 'Counties was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
