<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Job;
use App\User;
use App\Userjobs;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Skill;
use App\JobSkill;
use Validator;

class jobsController extends Controller
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->paginate(5);
        return View('jobs.index', compact('jobs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        return view('jobs.create')->withSkills($skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
                'title' => 'required|max:100',
                'description'  => 'required|max:3000',
                'salary'  => 'required|numeric|min:1|max:90000',
                'location'  => 'required|max:100',
                'skills'  => 'required',
            ]);
        // store in the database
        $user = Auth::user()->id;
        $job = new job;
        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->user_id = $user;
        $job->save();
        
        $job->skills()->attach($request->skills);
        $job->save();

        Session::flash('success', 'The job was successfully save!');
        return redirect()->route('job.show', $job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $jobskills = JobSkill::where('job_id', $id)->get();
        return view('jobs.show')->withJob($job)->withSkills($jobskills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit')->withJob($job);

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
         $this->validate($request, array(
                'title' => 'required|max:255',
                'description'  => 'required'
            ));
        // Save the data to the database
        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->location = $request->input('location');
        $job->save();
        // set flash data with success message
        Session::flash('success', 'This job was successfully updated.');
        // redirect with flash data to posts.show
        return redirect()->route('job.show', $job->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Job::find($id);
        $post->delete();
        Session::flash('success', 'The job was successfully deleted.');
        return redirect()->route('job.index');
    }
    public function assignIndex($id){
        $job = Job::find($id);
        return view('jobs.assign')->withJob($job);
    }
    public function assign(Request $request, $id){
        $job = Job::find($id);

        $users = $request->input('users');
        
        if(is_array($users))
        {
           foreach ($users as $user) {
                $assingUser = Userjobs::where('user_id', $user)
                -> where('job_id', $id)
                ->update(['accepted' => 1 ]);
                echo 'job assigned' .$user;
               

           }
        }
        Session::flash('success', 'You have successfully assigned the job');
        return view('jobs.assign')->withJob($job);
    }

    public function apply($id){
        $job = Job::find($id);
        $userid = Auth::user()->id;
        try {
            $job->user()->attach($userid);
            Session::flash('success', 'You have been successfully applied for this job!');
            return view('jobs.show')->withJob($job);

        }
        catch(\Exception $e) { 
            Session::flash('danger', 'You have been already applied for this job! before');
            return view('jobs.show')->withJob($job)->with('message', 'you have already applied for this job'); 
        }
        //$job->user()->attach($userid);
    }
    

    public function approveIndex(){
      $jobs = Job::where('approved', 0)
               ->orderBy('title', 'desc')
               ->get();
        return view('jobs.approve')->withJobs($jobs); 
    }

    public function approve($id){

        $job = Job::where('id', $id)
               ->update(['approved' => 1]);
         $jobs = Job::all();
        Session::flash('success', 'Job have been approved');
        return redirect()->back();
        //return view('jobs.index')->withJobs($jobs);
        
    }

    public function approveAll(Request $request){
        
        $JobsId = $request->input('SelectedJobs');
        if(is_array($JobsId)){
            foreach ($JobsId as $job) {
            $job = Job::where('id', $job)
               ->update(['approved' => 1]);
            }
        }

        $jobs = Job::where('approved', 0)
               ->orderBy('title', 'desc')
               ->get();
        Session::flash('success', 'Jobs have been approved');
        return view('jobs.approve')->withJobs($jobs);
        
    }

    public function myjobs(){
        $userid = Auth::user()->id; 
        $userjobs = Userjobs::where('user_id', $userid)->pluck('job_id');
        $jobs = Job::simpleWhereIn_1($userjobs);
        return view('jobs.myjobs')->withJobs($jobs);
    }
}
