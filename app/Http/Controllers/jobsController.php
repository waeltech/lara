<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\job;
use LRedis;
use Validator;
use Session;
use Input;
use Redirect;




class jobsController extends Controller
{

    /**
     * Redirect to index.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect_to_index()
    {
        return redirect('jobs/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = job::orderBy('created_at', 'asc')->get();
        return view('jobs/index', [
            'jobs' => $jobs,]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        job::create($input);

        Session::flash('flash_message', 'job successfully added!');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = job::find($id);
        return view('jobs/show', ['job'=> $job,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $item = job::find($id);
        //$this->authorize('edit', $item);
        return view('jobs/edit', [
            'job' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = job::find($request->job_id);;

        $item->title = $request->title;
        $item->description = $request->description;
        $item->salary = $request->salarymin;
        $item->location = $request->location;
        $item->contact_name = $request->contact_name;
        $item->contact_email = $request->contact_email;

        $item->update();
        
        Session::flash('flash_message', 'Task successfully added!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete
        $job = job::findOrFail($id);
        $job->delete();

        // redirect
        Session::flash('flash_message', 'job successfully deleted!');
        return Redirect::to('jobs');
    }
}
