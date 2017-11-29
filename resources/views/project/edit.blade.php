@extends('layouts.main')

@section('page_title')
    Projects
@endsection

@section('additional_styles')
  
  {!! Html::style('css/select2.min.css') !!}

@endsection


@section('main_content')
  <h3><i class="lnr lnr-select"></i>&nbsp;Edit Project</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            Edit Project
          </h3>
        </div>
        <div class="panel-body">
          {!! Form::model($project, [ 'route'=>['project.update', $project->id], 'class'=>'form-horizontal', 'id'=>'form-edit-project', 'method'=>'put', 'files'=>true ]) !!}
            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                {!! Form::label('client_id', 'Client', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  <select name="client_id" id="client_id" class="form-control">
                    @if(old('client_id'))
                      <option value="{{ \App\Client::find(old('client_id'))->id }}">
                        {{ \App\Client::find(old('client_id'))->name }}
                      </option>
                    @endif
                  </select>
                </div>
                <div class="col-md-4">
                  @if ($errors->has('client_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('client_id') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Project Name', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name of the project']) !!}
                </div>
                <div class="col-md-4">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                {!! Form::label('description', 'Description', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'description', 'placeholder'=>'Description of the project']) !!}
                </div>
                <div class="col-md-4">
                  @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('project_manager_id') ? ' has-error' : '' }}">
                {!! Form::label('project_manager_id', 'Project Manager', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  <select name="project_manager_id" id="project_manager_id" class="form-control">
                    @if(old('project_manager_id'))
                      <option value="{{ \App\User::find(old('project_manager_id'))->id }}">
                        {{ \App\User::find(old('project_manager_id'))->name }}
                      </option>
                    @endif
                  </select>
                </div>
                <div class="col-md-4">
                  @if ($errors->has('project_manager_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('project_manager_id') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('', '', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                    <a href="{{ url('project') }}" class="btn btn-default">
                        <i class="fa fa-repeat"></i>&nbsp;Cancel
                    </a>&nbsp;
                    <button type="submit" class="btn btn-info" id="btn-save-project">
                        <i class="fa fa-save"></i>&nbsp;Save
                    </button>
                </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
      
  
@endsection


@section('additional_scripts')

  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    
    //block Select Client
    $('#client_id').select2({
      placeholder: 'Select Client',
      ajax: {
        url: '{!! url('select2Client') !!}',
        data: function (params) {
             return {
                  q: params.term,
                  page: params.page
             };
        },
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.name,
                      id: item.id
                  }
              })
          };
        },
        cache: true
      },
      allowClear : true
    });
    $('#client_id').append('<option value="{{$project->client->id}}">{{$project->client->name}}</option>').trigger("change");
    //ENDBlock Select Client


    //Block Select Project Manager
    $('#project_manager_id').select2({
      placeholder: 'Select Project Manager',
      ajax: {
        url: '{!! url('select2ProjectManager') !!}',
        data: function (params) {
             return {
                  q: params.term,
                  page: params.page
             };
        },
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.name,
                      id: item.id
                  }
              })
          };
        },
        cache: true
      },
      allowClear : true,
    });
    $('#project_manager_id').append('<option value="{{$project->project_manager->id}}">{{$project->project_manager->name}}</option>').trigger("change");
    //ENDBlock Select Project Manager

    //project form submission
    $('#form-edit-project').on('submit', function(){
      $('#btn-save-project').prop('disabled', true);
    });
  </script>
@endsection