<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Training::with('room', 'member')->get();
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
        $data = Training::insert([
            'coach'=> $request->coach,
            'date'=> $request->date,
            'room_id'=> $request->room_id
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
        $data = Training::with('room', 'member')->findOrFail($id);
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
        $training = Training::find($id);

        $training->update([
            'coach'=> $request->coach,
            'date'=> $request->date,
            'room_id'=> $request->room_id
            ]);

            return $training;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete($id);
        return'{"Success":"You have succesfully deleted the training."}'; 
    }


    public function addMember(Request $request, $training_id, $member_id)
    {
        $training = Training::find($training_id);
        $training->member()->attach($member_id);
        return $training;
    }

    public function removeMember($training_id, $member_id)
    {
        $training = Training::find($training_id);
        $training->member()->detach($member_id);
        return $training;
    }

}
