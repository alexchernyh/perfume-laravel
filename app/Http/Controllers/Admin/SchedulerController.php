<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleTask;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $new_task = new ScheduleTask();
        // $new_task->name = $request->name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleTask  $scheduleTask
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleTask $scheduleTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleTask  $scheduleTask
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleTask $scheduleTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleTask  $scheduleTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleTask $scheduleTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleTask  $scheduleTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleTask $scheduleTask)
    {
        //
    }
}
