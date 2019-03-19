<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Packet;
use App\Models\Service;
use Illuminate\Http\Request;
use Session;
use DB;

class PacketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $packet = Packet::whereTranslationLike('name', "%$keyword%")
                ->paginate($perPage);
        } else {
            $packet = Packet::paginate($perPage);
        }

        $serviceitems = Service::paginate($perPage);

        return view('admin.packet.index', compact('packet','serviceitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $services = Service::listsTranslations('name')->pluck('name', 'id');
        
        $listservice = array();

        return view('admin.packet.create', compact('services', 'listservice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = new Packet();
        $requestData->price = $request->price;
        $requestData->months = $request->months;
        $requestData->new_price = $request->new_price;
        $requestData->yearlyprice = $request->yearlyprice;
        $requestData->options = $request->options;

        foreach (config('app.language') as $locale => $suffix) {
            $requestData->translateOrNew($locale)->name = $request->input("name{$suffix}");
        }
        
        $requestData->save();

        if($request->services) {
            $id = $requestData->id;
            $requestData = Packet::find($id);
            $requestData->service()->attach($request->services);    
        }

        Session::flash('flash_message', 'Packet added!');

        return redirect('admin/packet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $packet = Packet::findOrFail($id);

        return view('admin.packet.show', compact('packet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $packet = Packet::findOrFail($id);
       
        $services = Service::listsTranslations('name')->pluck('name', 'id');

        //$listservice = Service::with('packet')->pluck('id');

        $listservice = $packet->service->pluck('id')->toArray();

        return view('admin.packet.edit', compact('packet', 'services','listservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = Packet::findOrFail($id);

        $requestData->price = $request->input('price');
        $requestData->months = $request->input('months');
        $requestData->new_price = $request->input('new_price');
        $requestData->yearlyprice = $request->input('yearlyprice');
        $requestData->options = $request->input('options');

        foreach (['en'=> '', 'sq' => '_sq'] as $locale => $suffix) {
            $requestData->translateOrNew($locale)->name = $request->input("name{$suffix}");
        }

        $requestData->update();

        if($request->services) {
            $requestData->service()->sync($request->services);
        } else {
            $requestData->service()->detach($request->services);
        }

        Session::flash('flash_message', 'Packet updated!');

        return redirect('admin/packet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Packet::destroy($id);

        Session::flash('flash_message', 'Packet deleted!');

        return redirect('admin/packet');
    }
}
