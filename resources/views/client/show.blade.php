@extends('layouts.main')

@section('page_title')
    Client-{{ $client->name }}
@endsection

@section('additional_styles')

@endsection


@section('main_content')
  <h3><i class="lnr lnr-users"></i>&nbsp;Client Detail</h3>
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            Client Information
          </h3>
          <div class="pull-right">
            <a href="{{ url('client/'.$client->id.'/edit') }}" class=""><i class="fa fa-edit"></i>&nbsp;Edit</a>
          </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td style="width:20%;">Name</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $client->name }}</td>
              </tr>
              <tr>
                <td style="width:20%;">Address</td>
                <td style="width:5%;">:</td>
                <td style="">{!! nl2br($client->address) !!}</td>
              </tr>
              <tr>
                <td style="width:20%;">Primary Contact Name</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $client->primary_contact_name }}</td>
              </tr>
              <tr>
                <td style="width:20%;">Primary Contact Number</td>
                <td style="width:5%;">:</td>
                <td style="">{{ $client->primary_contact_number }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            Projects <small>Projects related to client</small>
          </h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
           
          </div>
        </div>
      </div>
    </div>

  </div>
      
  
@endsection


@section('additional_scripts')

  

@endsection