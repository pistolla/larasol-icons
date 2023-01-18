<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountiesFormRequest;
use App\Models\Produces;
use Exception;

class ProducesController extends Controller
{

    /**
     * Display a listing of the produces.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $producesObjects = Produces::paginate(10);

        return view('produces.index', compact('producesObjects'));
    }

    /**
     * Show the form for creating a new produces.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('produces.create');
    }

    /**
     * Store a new produces in the storage.
     *
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(CountiesFormRequest $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Produces::create($data);

            return redirect()->route('produces.produces.index')
                ->with('success_message', 'Produces was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified produces.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $produces = Produces::findOrFail($id);

        return view('produces.show', compact('produces'));
    }

    /**
     * Show the form for editing the specified produces.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $produces = Produces::findOrFail($id);
        

        return view('produces.edit', compact('produces'));
    }

    /**
     * Update the specified produces in the storage.
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
            
            $produces = Produces::findOrFail($id);
            $produces->update($data);

            return redirect()->route('produces.produces.index')
                ->with('success_message', 'Produces was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified produces from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $produces = Produces::findOrFail($id);
            $produces->delete();

            return redirect()->route('produces.produces.index')
                ->with('success_message', 'Produces was successfully deleted.');
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
                'produce_name' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
