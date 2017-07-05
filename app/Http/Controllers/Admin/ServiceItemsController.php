<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Http\Request;
use Session;

class ServiceItemsController extends Controller
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
            $serviceitems = Service::whereTranslationLike('name', "%$keyword%")			
                ->paginate($perPage);
        } else {
            $serviceitems = Service::paginate($perPage);
        }

        return view('admin.service-items.index', compact('serviceitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.service-items.create');
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
        
        //$requestData = $request->all();
        
        //ServiceItem::create($requestData);
        $this->validate($request, [
                'attach' => 'required|max:2000|mimes:jpeg,png',
            ]);

        $requestData = new Service();

        $fileName = $request->file('attach')->getClientOriginalName();
        $renamed = rand(100, 1000).'-'.Carbon::now()->format('d-m-Y').'-'.$fileName;
            
        $request->file('attach')->move(
            base_path() . '/public/uploads/services', $renamed
        );

        $requestData->image = $renamed;
        
        $requestData->translateOrNew('en')->name = $request->name;
        $requestData->translateOrNew('sq')->name = $request->name_sq;

        $requestData->translateOrNew('en')->description = nl2br($request->description);
        $requestData->translateOrNew('sq')->description = nl2br($request->description_sq);

        $requestData->save();

        Session::flash('flash_message', 'ServiceItem added!');

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
    
        $serviceitem = Service::translated()->findOrFail($id);

        return view('admin.service-items.show', compact('serviceitem'));
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
        $serviceitem = Service::translated()->findOrFail($id);

        return view('admin.service-items.edit', compact('serviceitem'));
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

        $requestData = Service::findOrFail($id);

        if($request->file('attach')) {
            $fileName = $request->file('attach')->getClientOriginalName();
            $renamed = rand(100, 1000).'-'.Carbon::now()->format('d-m-Y').'-'.$fileName;
                
            $request->file('attach')->move(
                base_path() . '/public/uploads/services', $renamed
            );
            $requestData->image = $renamed;
        }

        

        foreach (['en'=> '', 'sq' => '_sq'] as $locale => $suffix) {
            $requestData->translateOrNew($locale)->name = nl2br($request->input("name{$suffix}"));
            $requestData->translateOrNew($locale)->description = nl2br($request->input("description{$suffix}"));
        }

        $requestData->update();


        Session::flash('flash_message', 'ServiceItem updated!');

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
        Service::destroy($id);

        Session::flash('flash_message', 'ServiceItem deleted!');

        return redirect('admin/packet');
    }
}
