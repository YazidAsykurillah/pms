@extends('layouts.main')

@section('page_title')
  Edit Client
@endsection

@section('additional_styles')

@endsection


@section('main_content')
  <h3><i class="lnr lnr-users"></i>&nbsp;Edit Client</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            Edit Client
          </h3>
        </div>
        <div class="panel-body">
          {!! Form::model($client, ['route'=>['client.update', $client->id], 'class'=>'form-horizontal','id'=>'form-edit-client', 'method'=>'put', 'files'=>true]) !!}
                           
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                </div>
                <div class="col-md-4">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                {!! Form::label('address', 'Address', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::textarea('address', null, ['class'=>'form-control', 'id'=>'address']) !!}
                </div>
                <div class="col-md-4">
                  @if ($errors->has('address'))
                    <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('primary_contact_name') ? ' has-error' : '' }}">
                {!! Form::label('primary_contact_name', 'Primary Contact Name', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('primary_contact_name', null, ['class'=>'form-control', 'id'=>'primary_contact_name']) !!}
                  
                </div>
                <div class="col-md-4">
                  @if ($errors->has('primary_contact_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('primary_contact_name') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('primary_contact_number') ? ' has-error' : '' }}">
                {!! Form::label('primary_contact_number', 'Primary Contact Number', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('primary_contact_number', null, ['class'=>'form-control', 'id'=>'primary_contact_number']) !!}
                  
                </div>
                <div class="col-md-4">
                  @if ($errors->has('primary_contact_number'))
                    <span class="help-block">
                      <strong>{{ $errors->first('primary_contact_number') }}</strong>
                    </span>
                  @endif
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::label('', '', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                    <a href="{{ url('client') }}" class="btn btn-default">
                        <i class="fa fa-repeat"></i>&nbsp;Cancel
                    </a>&nbsp;
                    <button type="submit" class="btn btn-info" id="btn-save-client">
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

  <script type="text/javascript">
  </script>

@endsection