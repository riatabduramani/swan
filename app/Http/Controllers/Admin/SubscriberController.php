<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Session;
use App\User;

class SubscriberController extends Controller
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
            $subscriber = Subscriber::where('subscriber', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $subscriber = Subscriber::paginate($perPage);
        }

        return view('admin.subscriber.index', compact('subscriber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.subscriber.create');
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
        
        $requestData = $request->all();
        
        Subscriber::create($requestData);

        Session::flash('flash_message', 'Subscriber added!');

        return redirect('admin/subscriber');
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
        $subscriber = Subscriber::findOrFail($id);

        return view('admin.subscriber.show', compact('subscriber'));
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
        $subscriber = Subscriber::findOrFail($id);

        return view('admin.subscriber.edit', compact('subscriber'));
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
        
        $requestData = $request->all();
        
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($requestData);

        Session::flash('flash_message', 'Subscriber updated!');

        return redirect('admin/subscriber');
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
        Subscriber::destroy($id);

        Session::flash('flash_message', 'Subscriber deleted!');

        return redirect('admin/subscriber');
    }
}
