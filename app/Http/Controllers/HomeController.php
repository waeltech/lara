<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Job;
use App\Userjobs;
use App\Skill;
use App\JobSkill;
use App\UserSkill;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function design()
    {
        $roles = Role::all();
        $users = User::all();
        $userroles = DB::table('role_user')->get();
        $jobstable = Job::all();
        $userjobs = Userjobs::all();
        $permissions = DB::table('permissions')->get();
        $permissionroles = DB::table('permission_role')->get();
        $skills = Skill::all();
        $jobskills = JobSkill::all();
        $userskills = UserSkill::all();



        return View('design')
             ->withJobs($jobstable)
             ->withJobsusers($userjobs)
             ->withusers($users)
             ->withroles($roles)
             ->withuserroles($userroles)
             ->withpermissions($permissions)
             ->withpermissionroles($permissionroles)
             ->withskills($skills)
             ->withjobskills($jobskills)
             ->withuserskills($userskills);
    }

    
}
