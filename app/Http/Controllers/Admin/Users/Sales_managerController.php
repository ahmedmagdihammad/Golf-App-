<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SalesManager;
use App\GovernorateManager;

class Sales_managerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesManagers = SalesManager::all();
        $GovManagers = GovernorateManager::all();
        return view('pages/users/salesManagers', compact('salesManagers', 'GovManagers'));
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
        $salesManag = new SalesManager();
        $salesManag->name = $request->name;
        $salesManag->phone = $request->phone;
        $salesManag->address = $request->address;
        $salesManag->national_id = $request->national_id;
        if ($request->hasFile('picture')) {
            $salesManag->picture = $this->uploadimage($request->picture);
        }
        $salesManag->governorate_manager_id = $request->governorate_manager_id;
        $salesManag->created_by = $request->created_by;
        $salesManag->save();
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
        $salesManag = SalesManager::find($id);
        $salesManag->name = $request->upname;
        $salesManag->phone = $request->upphone;
        $salesManag->address = $request->upaddress;
        $salesManag->national_id = $request->upnational_id;
        if ($request->hasFile('uppicture')) {
            $salesManag->picture = $this->uploadimage($request->uppicture);
        }

        $salesManag->governorate_manager_id = $request->upgovernorate_manager_id;
        $salesManag->created_by = $request->upcreated_by;
        $salesManag->save();
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
        SalesManager::find($id)->delete();
        return back();
    }
}
