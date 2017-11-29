<?php

namespace App\Listeners;

use App\Events\ProjectWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Carbon\Carbon;

use App\Project;

class UpdateProjectCode
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectWasCreated  $event
     * @return void
     */
    public function handle(ProjectWasCreated $event)
    {

        $max_project_number = 0;
        $cd = Carbon::now();
        //get maximum project code that created today.
        $p_cd_getter = 'P-'.$cd->year.$cd->month.$cd->day;
        $project = Project::where('code', 'LIKE', "%$p_cd_getter%");
        if($project){
            $max_project_number = abs(substr($project->max('code'),11));
        }
        $project_code = "$p_cd_getter-".str_pad(($max_project_number+1), 3, 0, STR_PAD_LEFT);
        
        \DB::table('projects')->where('id', $event->project->id)->update(['code'=>$project_code]);

    }
}
