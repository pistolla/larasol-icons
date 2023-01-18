<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramsFormRequest;
use App\Models\Program;
use Exception;

class ProgramsController extends Controller
{

    /**
     * Display a listing of the programs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::paginate(10);

        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new program.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('programs.create');
    }

    /**
     * Store a new program in the storage.
     *
     * @param App\Http\Requests\ProgramsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(ProgramsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Program::create($data);

            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified program.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);

        return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified program.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        

        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified program in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ProgramsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, ProgramsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $program = Program::findOrFail($id);
            $program->update($data);

            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified program from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $program = Program::findOrFail($id);
            $program->delete();

            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
