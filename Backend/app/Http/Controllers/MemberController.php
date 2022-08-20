<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; 
use App\Models\Membership;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::with('memberships')->get();
        return $data;
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
        
        $data = Member::insert([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'memberships_id' => $request->memberships_id
        ]);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::with('memberships')->findOrFail($id);
        return $data;
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
    $member = Member::find($id);

        $member->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'memberships_id' => $request->memberships_id
            ]);

            return $member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete($id);
        return'{"Success":"You have succesfully deleted the member."}';  
    }
}
