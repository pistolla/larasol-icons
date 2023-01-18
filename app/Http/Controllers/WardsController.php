<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountiesFormRequest;
use App\Models\County;
use App\Models\Wards;
use Exception;

class WardsController extends Controller
{

    /**
     * Display a listing of the wards.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $wardsObjects = Wards::with('county')->paginate(10);

        return view('wards.index', compact('wardsObjects'));
    }

    /**
     * Show the form for creating a new wards.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $counties = County::pluck('created_at','id')->all();
        
        return view('wards.create', compact('counties'));
    }

    /**
     * Store a new wards in the storage.
     *
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(CountiesFormRequest $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Wards::create($data);

            return redirect()->route('wards.wards.index')
                ->with('success_message', 'Wards was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified wards.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $wards = Wards::with('county')->findOrFail($id);

        return view('wards.show', compact('wards'));
    }

    /**
     * Show the form for editing the specified wards.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $wards = Wards::findOrFail($id);
        $counties = County::pluck('created_at','id')->all();

        return view('wards.edit', compact('wards','counties'));
    }

    /**
     * Update the specified wards in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, CountiesFormRequest $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $wards = Wards::findOrFail($id);
            $wards->update($data);

            return redirect()->route('wards.wards.index')
                ->with('success_message', 'Wards was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified wards from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wards = Wards::findOrFail($id);
            $wards->delete();

            return redirect()->route('wards.wards.index')
                ->with('success_message', 'Wards was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param App\Http\Requests\CountiesFormRequest\CountiesFormRequest $request 
     * @return array
     */
    protected function getData(CountiesFormRequest $request)
    {
        $rules = [
                'ward_name' => 'string|min:1|nullable',
            'county_id' => 'numeric|min:0|max:4294967295|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
