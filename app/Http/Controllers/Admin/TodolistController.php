<?php

namespace App\Http\Controllers\Admin;
use App\Models\Todolist;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodolistController extends Controller
{
    public function index() {

    	if(Auth::user()->hasRole(['superadmin','admin'])) {

    		$tasks = Todolist::whereNull('datedone')->orderBy('duedate','asc')->get();
    		
    		$tasksdone = Todolist::whereNotNull('datedone')->orderBy('duedate','asc')->paginate(10);

    	} else {
    		
    		$tasks = Todolist::whereNull('datedone')->where('assigned_to', Auth::user()->id)->orderBy('duedate','asc')->get();
    		
    		$tasksdone = Todolist::whereNotNull('datedone')->where('assigned_to', Auth::user()->id)->orderBy('duedate','asc')->paginate(15);

    	}

        $users = User::whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee')->orWhere('name', 'admin');
                        })->pluck('name','id');


        return view('admin.tasks.index', compact('users','tasks','tasksdone'));
    }

    public function createtask(Request $request)
    {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'duedate' => 'required',
            ]);

            $todolist = new Todolist;
            $todolist->title = $request->title;
            $todolist->description = $request->description;
            
            if(!empty($request->assign_to)) {
                $todolist->assigned_to = $request->assign_to;    
            } else {
                $todolist->assigned_to = Auth::user()->id;
            }
            
            $todolist->created_by = Auth::user()->id;
            $todolist->duedate = $request->duedate;

            if(!empty($request->repeat)) {
                $todolist->repeat = $request->repeat;
            }

            $todolist->save();

            Session::flash('flash_message', 'Your task has been added!');
            return redirect()->back();          
    }

    public function destroy($id) {
        Todolist::destroy($id);
        Session::flash('flash_message', 'Your task has been deleted!');
        return redirect()->back();
    }

    public function doneTask(Request $request, $id) {

        $todolist = Todolist::findOrFail($id);
        $todolist->datedone = Carbon::now();
        $todolist->updated_by = Auth::user()->id;

        if(!empty($request->norepeat)) {
           $todolist->repeat = null;
        }

        $todolist->update();

        Session::flash('flash_message', 'Your task has been marked as Done!');
        return redirect()->back();
    }


    public function toeditTask(Request $request, $id) {
        if(Auth::user()->hasRole(['superadmin','admin'])) {

    		$tasks = Todolist::whereNull('datedone')->orderBy('duedate','asc')->get();
    		
    		$tasksdone = Todolist::whereNotNull('datedone')->orderBy('duedate','asc')->paginate(10);

    	} else {
    		
    		$tasks = Todolist::whereNull('datedone')->where('assigned_to', Auth::user()->id)->orderBy('duedate','asc')->get();
    		
    		$tasksdone = Todolist::whereNotNull('datedone')->where('assigned_to', Auth::user()->id)->orderBy('duedate','asc')->paginate(15);

    	}

        $users = User::whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee')->orWhere('name', 'admin');
                        })->pluck('name','id');

        return view('admin.tasks.edit', compact('users','tasks','tasksdone'));
    }

    public function editTask(Request $request, $id) {

        $todolist = Todolist::findOrFail($id);
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        
        if(!empty($request->assign_to)) {
            $todolist->assigned_to = $request->assign_to;    
        } else {
            $todolist->assigned_to = Auth::user()->id;
        }
        
        $todolist->created_by = Auth::user()->id;
        $todolist->duedate = $request->duedate;

        if(!empty($request->repeat)) {
            $todolist->repeat = $request->repeat;
        }

        $todolist->save();

        Session::flash('flash_message', 'Your task has been Edited successfully.');
        return redirect()->back();
    }

}
