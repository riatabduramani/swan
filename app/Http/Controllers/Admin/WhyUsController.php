<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Models\Whyus;
use DB;
use Hash;
use Alert;
use Auth;
use Redirect;
use Session;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $whyus = Whyus::translated()->get();

        return view('admin.pages.index', compact('whyus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.whyus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $requestData = new Whyus();
        
        $requestData->translateOrNew('en')->title = $request->title;
        $requestData->translateOrNew('sq')->title = $request->title_sq;

        $requestData->translateOrNew('en')->description = $request->description;
        $requestData->translateOrNew('sq')->description = $request->description_sq;

        $requestData->save();

        Session::flash('flash_message', 'WhyUs item added!');

        return redirect('admin/pages');
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
        $whyus = Whyus::translated()->findOrFail($id);

        return view('admin.whyus.edit', compact('whyus'));
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
        $requestData = Whyus::findOrFail($id);

        foreach (['en'=> '', 'sq' => '_sq'] as $locale => $suffix) {
            $requestData->translateOrNew($locale)->title = $request->input("title{$suffix}");
            $requestData->translateOrNew($locale)->description = $request->input("description{$suffix}");
        }

        $requestData->update();


        Session::flash('flash_message', 'WhyUs item updated!');

        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Whyus::destroy($id);

        Session::flash('flash_message', 'WhyUs item deleted!');

        return redirect('admin/pages');
    }
}
