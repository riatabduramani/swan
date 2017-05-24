<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Settings::get()->first();

        return view('admin.settings.index',compact('settings'));
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
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required',
            'phone' => 'required',
        ]);

        try {

                $settings = Settings::find($id);
                $settings->company_logo = $request->company_logo;
                $settings->company_keywords = $request->company_keywords;
                $settings->mob = $request->mob;
                $settings->mob1 = $request->mob1;
                $settings->phone = $request->phone;
                $settings->phone1 = $request->phone1;
                $settings->fax = $request->fax;
                $settings->email = $request->email;
                $settings->email1 = $request->email1;
                $settings->facebook = $request->facebook;
                $settings->youtube = $request->youtube;
                $settings->linkedin = $request->linkedin;
                $settings->googleplus = $request->googleplus;
                $settings->instagram = $request->instagram;
                $settings->currency = $request->currency;
                $settings->googleanalytics = $request->googleanalytics;
                $settings->googlemap = $request->googlemap;

                foreach (config('app.language') as $locale => $suffix) {
                    $settings->translateOrNew($locale)->company_name = $request->input("company_name{$suffix}");
                    $settings->translateOrNew($locale)->company_slogan = $request->input("company_slogan{$suffix}");
                    $settings->translateOrNew($locale)->company_shortdescription = $request->input("company_shortdescription{$suffix}");
                    $settings->translateOrNew($locale)->address = nl2br($request->input("address{$suffix}"));
                }

                $settings->update();
                
                return redirect('admin/settings/')
                                ->with('flash_message','Settings updated successfully.');
            
        } catch (Exception $e) {
            return redirect('admin/settings/')
                                ->with('flash_error','Error while updating Settings!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
