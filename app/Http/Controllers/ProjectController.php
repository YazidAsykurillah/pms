<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

//form requests
use App\Http\Requests\StoreProjectRequest;

//events
use Event;
use App\Events\ProjectWasCreated;

//necessary models
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->client_id = $request->client_id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->project_manager_id = $request->project_manager_id;
        $project->save();
        
        //fire event ProjectWasCreated
        Event::fire(new ProjectWasCreated($project));

        return redirect('project')
            ->with('successMessage', "Project has been created");
        

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete(Request $request)
    {
        $deleted = \DB::table('projects')->whereIn('id', $request->project_id)->delete();
        return redirect('project')
            ->with('successMessage', $deleted." ".str_plural('Project', $deleted)." has been deleted");
        // $plural = str_plural('child', 2);
    }
}
