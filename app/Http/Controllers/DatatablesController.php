<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use App\User;
use App\Client;
use App\Project;

class DatatablesController extends Controller
{

    //display users datatables
    public function getUsers(Request $request)
    {
    	\DB::statement(\DB::raw('set @rownum=0'));
        $users = User::with('roles')->select([
                \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'users.*'
            ]); 
        
        $data_users = Datatables::of($users)
            
            ->addColumn('roles', function (User $user) {
                    return $user->roles->map(function($role) {
                        return str_limit($role->name, 30, '...');
                    })->implode('<br>');
            })
            ->addColumn('actions', function($users){
                    $actions_html ='<a href="'.url('user/'.$users->id.'').'" class="btn" title="Click to view the detail">';
                    $actions_html .=    '<i class="lnr lnr-enter"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<a href="'.url('user/'.$users->id.'/edit').'" class="btn" title="Click to edit this user">';
                    $actions_html .=    '<i class="lnr lnr-pencil"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<a href="#" class="btn btn-delete-user" data-id="'.$users->id.'" data-text="'.$users->name.'">';
                    $actions_html .=    '<i class="lnr lnr-trash"></i>';
                    $actions_html .='</a>';

                    return $actions_html;
            });

        if ($keyword = $request->get('search')['value']) {
            $data_users->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $data_users->make(true);
    }


    //display clients datatables
    public function getClients(Request $request)
    {
        \DB::statement(\DB::raw('set @rownum=0'));
        $clients = Client::select([
                \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'clients.*'
            ]); 
        
        $data_clients = Datatables::of($clients)
            ->addColumn('actions', function($clients){
                    $actions_html ='<a href="'.url('client/'.$clients->id.'').'" class="btn" title="Click to view the detail">';
                    $actions_html .=    '<i class="lnr lnr-enter"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<a href="'.url('client/'.$clients->id.'/edit').'" class="btn" title="Click to edit this client">';
                    $actions_html .=    '<i class="lnr lnr-pencil"></i>';
                    $actions_html .='</a>&nbsp;';

                    return $actions_html;
            });

        if ($keyword = $request->get('search')['value']) {
            $data_clients->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $data_clients->make(true);
    }


    //Project datatables
    public function getProjects(Request $request)
    {
        \DB::statement(\DB::raw('set @rownum=0'));
        $projects = Project::select([
                \DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'projects.*'
            ])
            ->with('client')
            ->with('project_manager');
        
        $data_projects = Datatables::of($projects)
            ->addColumn('client', function($projects){
                return $projects->client ? $projects->client->name : NULL;
            })
            ->addColumn('project_manager', function($projects){
                return $projects->project_manager ? $projects->project_manager->name : NULL;
            })
            ->addColumn('actions', function($projects){
                    $actions_html ='<a href="'.url('project/'.$projects->id.'').'" class="btn" title="Click to view the detail">';
                    $actions_html .=    '<i class="lnr lnr-enter"></i>';
                    $actions_html .='</a>&nbsp;';
                    $actions_html .='<a href="'.url('project/'.$projects->id.'/edit').'" class="btn" title="Click to edit this project">';
                    $actions_html .=    '<i class="lnr lnr-pencil"></i>';
                    $actions_html .='</a>&nbsp;';

                    return $actions_html;
            });

        if ($keyword = $request->get('search')['value']) {
            $data_projects->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $data_projects->make(true);
    }
}
