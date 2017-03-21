<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Packet;
use Illuminate\Http\Request;
use Session;

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
            $packet = Packet::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $packet = Packet::paginate($perPage);
        }

        return view('admin.packet.index', compact('packet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.packet.create');
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
        $requestData->options = $request->options;
        $requestData->translateOrNew('en')->name = $request->name;
        $requestData->translateOrNew('sq')->name = $request->name_sq;

        $requestData->save();

        
        //Packet::create($requestData);

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
        $packet = Packet::translated()->findOrFail($id);

        return view('admin.packet.edit', compact('packet'));
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
        
        //$requestData = $request->all();
        
        $packet = Packet::findOrFail($id);

        $requestData->price = $request->price;
        $requestData->options = $request->options;
        $requestData->translateOrNew('en')->name = $request->name;
        $requestData->translateOrNew('sq')->name = $request->name_sq;
        
        $packet->update($requestData);

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
