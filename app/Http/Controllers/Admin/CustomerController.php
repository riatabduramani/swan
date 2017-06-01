<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Comment;
use App\Models\Potential;
use App\Models\District;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Todolist;
use App\Models\Document;
use App\Models\Credits;
use File;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    
    public function index(Request $request) {

        $keyword = $request->get('search');
        $status = $request->get('status');
        $confirmed = $request->get('confirmed');
        $perPage = 25;

        if (!empty($keyword)) {
            $customer = Customer::whereHas('user', function ($query) use($keyword) {
                    $query->where('name', 'like', "%$keyword%")
                        ->orWhere('surname','like',"%$keyword%")
                        ->orWhere('email','like',"%$keyword%");
                })->paginate($perPage);
        } elseif(!empty($status)) {
            $customer = Customer::whereHas('user', function ($query) use($status) {
                    $query->where('status', $status);
                })->paginate($perPage);
        } elseif(!empty($confirmed)) {
            $customer = Customer::whereHas('user', function ($query) use($confirmed) {
                    $query->where('confirmed', $confirmed);
                })->paginate($perPage);
        } else {
            $customer = Customer::paginate($perPage);
        }

        return view('admin.customer.index', compact('customer','status', 'confirmed'));
    }

    public function edit($id) {
    
        $customer = Customer::findOrFail($id);
        $country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $district = District::where('city_id', 1)->pluck('name','id');

        return view('admin.customer.edit', compact('customer','country', 'city', 'district'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone_out' => 'required',
            'phone_in' => 'required',
            'address_out' => 'required',
            'postal_out' => 'required',
            'city' => 'required',
            'address_in' => 'required',
            'status' => 'required',
            'confirmed' => 'required',
            'district_in_id' => 'required',
        ]);

        if(isset($request)) {

            $userid = Auth::user()->id;

            $customer = Customer::findOrFail($id);
            $customer->address_out = $request->address_out;
            $customer->city = $request->city;
            $customer->country_in_id = $request->country_in_id;
            $customer->postal_out = $request->postal_out;
            $customer->phone_out = $request->phone_out;
            $customer->address_in = $request->address_in;
            $customer->district_in_id = $request->district_in_id;
            $customer->city_in_id = $request->city_in_id;
            $customer->country_id = $request->country_id;
            $customer->phone_in = $request->phone_in;
            $customer->emergencycontact = $request->emergencycontact;
            $customer->emergencyphone = $request->emergencyphone;
            $customer->created_by = Auth::user()->name.' '.Auth::user()->surname;
            $customer->updated_by = $userid;
            $customer->update();

            $user = User::findOrFail($customer->user_id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            //$user->password = bcrypt(str_random(8));

            $user->status = $request->status;
            $user->confirmed = $request->confirmed;
            $user->update();

            if(isset($request->comment)){
                $customer->comments()->create([
                    'body' => $request->comment,
                    'commentable_id' => $id,
                    'commented_by' => Auth::user()->id,
                    'commentable_type' => get_class($customer),
                    'created_by' => Auth::user()->name.' '.Auth::user()->surname,
                ]);
            }
        }

        Session::flash('flash_message', 'Customer updated successfully!');

        return redirect('admin/customer/'.$id.'/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $district = District::where('city_id', 1)->pluck('name','id');

        return view('admin.customer.create', compact('country', 'city', 'district'));
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
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'phone_out' => 'required',
            'phone_in' => 'required',
            'address_out' => 'required',
            'postal_out' => 'required',
            'city' => 'required',
            'address_in' => 'required',
            'status' => 'required',
            'confirmed' => 'required',
            'district_in_id' => 'required',
        ]);

        if(isset($request)) {

            $userid = Auth::user()->id;

            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = bcrypt(str_random(8));
            $user->status = $request->status;
            $user->confirmed = $request->confirmed;
            $user->save();
            $lastid = $user->id;

            $user->attachRole(4, $lastid);

            $customer = new Customer();
            $customer->user_id = $lastid;
            $customer->address_out = $request->address_out;
            $customer->city = $request->city;
            $customer->country_in_id = $request->country_in_id;
            $customer->postal_out = $request->postal_out;
            $customer->phone_out = $request->phone_out;
            $customer->address_in = $request->address_in;
            $customer->district_in_id = $request->district_in_id;
            $customer->city_in_id = $request->city_in_id;
            $customer->country_id = $request->country_id;
            $customer->phone_in = $request->phone_in;
            $customer->emergencycontact = $request->emergencycontact;
            $customer->emergencyphone = $request->emergencyphone;
            $customer->created_by = Auth::user()->name.' '.Auth::user()->surname;
            $customer->save();

            $lastinsertedid = $customer->id;

            $customerlast = Customer::find($lastinsertedid);
            if(isset($request->comment)){

                $customerlast->comments()->create([
                    'body' => $request->comment,
                    'commentable_id' => $lastinsertedid,
                    'commented_by' => Auth::user()->id,
                    'commentable_type' => get_class($customer),
                    'created_by' => Auth::user()->name.' '.Auth::user()->surname,
                ]);
            }

            if(!empty($request->potential_id)) {
                
                Comment::where('commentable_id', $request->potential_id)
                        ->where('commentable_type','App\Models\Potential')
                        ->update(['commentable_id'=> $lastinsertedid, 'commentable_type' => get_class($customer)]);

                Potential::destroy($request->potential_id);
            /*
                $comment = Comment::where('commentable_id', $request->potential_id)
                        ->where('commentable_type','App\Models\Potential')->get();

                foreach ($comment as $newcomment) {
                    $addcomment = new Comment();

                    $addcomment->body = $newcomment->body;
                    $addcomment->commentable_id =  $lastinsertedid;
                    $addcomment->commentable_type = 'App\Models\Customer';
                    $addcomment->created_by = $newcomment->created_by;
                    $addcomment->save();
                }
            */

            }

        }
        
        Session::flash('flash_message', 'Customer created successfully!');

        return redirect('admin/customer/');
    }

    public function show($id) {

        $customer = Customer::with('cities','district','invoice')->findOrFail($id);
        //$chosenpacket = Subscription::with('customer')->where('customer_id', $id)->get()->last();
        $chosenpacket = Subscription::with('customer','invoice')
                                    ->where('customer_id', $id)
                                    ->where('end','>=', Carbon::now())
                                    ->get()->first();

        $chosenpacketnextpacket = Subscription::with('customer','invoice')
                                                ->where('customer_id', $id)
                                                ->where('end','>=', Carbon::now())
                                                ->get();
        //$invoices = Invoice::with('customer')->findOrFail();
        //$users = User::pluck('name','id');
        $tasks = Todolist::where('customer_id',$id)->whereNull('datedone')->orderBy('duedate','asc')->get();
        $tasksdone = Todolist::where('customer_id',$id)->whereNotNull('datedone')->orderBy('duedate','asc')->get();

        $users = User::whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee')->orWhere('name', 'admin');
                        })->pluck('name','id');

        $credit = Credits::with('customer')->where('customer_id', $id)->sum('balance');

        return view('admin.customer.show', compact('customer','chosenpacket','chosenpacketnextpacket','users','tasks','tasksdone','credit'));
    }

    public function destroy($id) {

        $customer = Customer::findOrFail($id);
        $user = $customer->user->id;
        User::destroy($user);

        Session::flash('flash_message', 'Customer deleted successfully!');
        return redirect('admin/customer');
    }


    public function storecomment(Request $request)
    {
            
            $comment = new Comment;
            $id = $request->customer_id;
            $comment->body     = $request->get('comment');
            $comment->commentable_id = $id;
            $comment->commented_by = Auth::user()->id;
            $comment->commentable_type = 'App\Models\Customer';
            $comment->created_by = Auth::user()->name.' '.Auth::user()->surname;
            $comment->save();

            Session::flash('flash_message', 'Your comment has been posted!');
            return redirect()->back();
            
    }

    public function deleteComment($id) {
        Comment::destroy($id);
        Session::flash('flash_message', 'Your comment has been deleted!');
        return redirect()->back();
    }

    public function deleteInvoice($id) {
        Invoice::destroy($id);
        Session::flash('flash_message', 'Invoice has been deleted!');
        return redirect()->back();
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
            $todolist->customer_id = $request->customer_id;
            
            if(!empty($request->assign_to)) {
                $todolist->assigned_to = $request->assign_to;    
            } else {
                $todolist->assigned_to = Auth::user()->id;
            }

            if(!empty($request->repeat)) {
                $todolist->repeat = $request->repeat;
            }
            
            $todolist->created_by = Auth::user()->id;
            $todolist->duedate = $request->duedate;
            $todolist->save();

            Session::flash('flash_message', 'Your task has been added!');
            return redirect()->back();          
    }

    public function deleteTask($id) {
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

    public function allowlogin(Request $request) {
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        Session::flash('flash_message', 'Done!');
        return redirect()->back();
    }

    public function attachdocument(Request $request)
    {
            
            $this->validate($request, [
                'attach' => 'required|max:5000|mimes:pdf,jpeg,png,doc,docx,excel',
            ]);
            
            $customerid = $request->customer_id;

            $attach = new Document;

            $attach->extension = $request->file('attach')->getClientOriginalExtension();
            
            $fileName = $request->file('attach')->getClientOriginalName();
            $renamed = rand(100, 1000).'-'.Carbon::now()->format('d-m-Y').'-'.$fileName;
            
            $request->file('attach')->move(
                base_path() . '/public/uploads/documents', $renamed
            );

            $attach->name = $fileName;
            $attach->description = $request->doc_description;
            $attach->renamed = $renamed;
            $attach->created_by = Auth::user()->id;
            $attach->type = $request->type;
            $attach->save();

            $attach->customer()->attach($customerid);

            Session::flash('flash_message', "Document $fileName Attached successfully!");
            return redirect()->back();
    }

    public function deleteDocument($id) {
            $document = Document::findOrFail($id);
            //unlink('/public/uploads/documents/'.$document->renamed);
            File::delete('uploads/documents/' . "$document->renamed");
            $document->delete();

            Session::flash('flash_message', 'Your document has been deleted!');
            return redirect()->back();
    }

}