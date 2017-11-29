@extends('layouts.main')

@section('page_title')
    Project - {{ $project->code }}
@endsection

@section('additional_styles')

@endsection


@section('main_content')
  <h3><i class="lnr lnr-select"></i>&nbsp;Project Detail</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            Project Detail
          </h3>
          <div class="pull-right">
            <a href="{{ url('project/'.$project->id.'/edit') }}" class=""><i class="fa fa-edit"></i>&nbsp;Edit</a>
          </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td style="width:20%;">Client</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $project->client ? $project->client->name : "" }}</td>
              </tr>
              <tr>
                <td style="width:20%;">Project Code</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $project->code }}</td>
              </tr>
              <tr>
                <td style="width:20%;">Description</td>
                <td style="width:5%;">:</td>
                <td style="">{!! $project->description !!}</td>
              </tr>
              <tr>
                <td style="width:20%;">Project Manager</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $project->project_manager ? $project->project_manager->name : "" }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
      
  
@endsection


@section('additional_scripts')

@endsection