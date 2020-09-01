<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CustomerServiceManager;
use App\GovernorateManager;

class Customer_serv_managController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CustomerServiceManagers = CustomerServiceManager::all();
        $GovManagers = GovernorateManager::all();
        return view('pages/users/CustomerServiceManagers', compact('CustomerServiceManagers', 'GovManagers'));
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
        $CustServManag = new CustomerServiceManager();
        $CustServManag->name = $request->name;
        $CustServManag->phone = $request->phone;
        $CustServManag->address = $request->address;
        $CustServManag->national_id = $request->national_id;
        if ($request->hasFile('picture')) {
        $CustServManag->picture = $this->uploadimage($request->picture);
        }

        $CustServManag->governorate_manager_id = $request->governorate_manager_id;
        $CustServManag->created_by = $request->created_by;

        $CustServManag->save();
        return back();
    }

    public function uploadimage($file)
    {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'images/'.$imagename; 

        return $returenurl;  
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
        $CustServManag = CustomerServiceManager::find($id);
        $CustServManag->name = $request->upname;
        $CustServManag->phone = $request->upphone;
        $CustServManag->address = $request->upaddress;
        $CustServManag->national_id = $request->upnational_id;
        if ($request->hasFile('uppicture')) {
        $CustServManag->picture = $this->uploadimage($request->uppicture);
        }
        $CustServManag->governorate_manager_id = $request->upgovernorate_manager_id;
        $CustServManag->created_by = $request->upcreated_by;
        
        $CustServManag->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerServiceManager::find($id)->delete();
        return back();
    }
}
