<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\Whyus;
use DB;
use Hash;
use Alert;
use Auth;
use Redirect;
use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::get()->first();
        $whyus = Whyus::translated()->get();

        return view('admin.pages.index',compact('pages','whyus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {

                $pages = Pages::find($id);

                foreach (config('app.language') as $locale => $suffix) {
                    $pages->translateOrNew($locale)->about = nl2br($request->input("about{$suffix}"));
                    $pages->translateOrNew($locale)->vision = nl2br($request->input("vision{$suffix}"));
                    $pages->translateOrNew($locale)->mission = nl2br($request->input("mission{$suffix}"));
                }

                $pages->update();
                
                return redirect('admin/pages/')
                                ->with('flash_message','Pages updated successfully.');
            
        } catch (Exception $e) {
            return redirect('admin/pages/')
                                ->with('flash_error','Error while updating Pages!');
        }
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
}
