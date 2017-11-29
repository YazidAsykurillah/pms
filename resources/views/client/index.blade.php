@extends('layouts.main')

@section('page_title')
    Clients
@endsection

@section('additional_styles')

@endsection


@section('main_content')
  <h3><i class="lnr lnr-users"></i>&nbsp;Clients</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="pull-left">
          <h3 class="panel-title">
            Clients List
          </h3>
        </div>
          <div class="pull-right">
            <a href="{{ url('client/create') }}" class="btn btn-xs btn-default" title="Create new client"><i class="fa fa-plus"></i>&nbsp;Create</a>
            <a href="#" class="btn btn-xs btn-danger" id="btn-delete-client" title="Delete selected clients"><i class="fa fa-minus-square"></i>&nbsp;Delete</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <div class="pms-datatable-utilities">
            <div class="pull-left">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <text id="client-entry-length-information">Show 10 entries</text> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="client-entry-length">
                  <li><a href="#">10</a></li>
                  <li><a href="#">25</a></li>
                  <li><a href="#">50</a></li>
                  <li><a href="#">100</a></li>
                </ul>
              </div>
            </div>
            <div class="pull-right">
              <text id="client-result-information">Showing 1-2 of 2 entries</text>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="table-responsive">
            <table class="table" id="client-table">
              <thead>
                <tr>
                  <th style="width:5%;">#</th>
                  <th style="width:20%;">Name</th>
                  <th>Address</th>
                  <th>Contact Name</th>
                  <th>Contact Number</th>
                  <th style="width:13%;text-align:center;">Action</th>
                </tr>
              </thead>
              <thead id="searchColumn" >
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-client">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {!! Form::open(['url'=>'client/delete', 'method'=>'post', 'id'=>'delete-client-form']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Client Confirmation</h4>
        </div>
        <div class="modal-body" id="body-delete-client">
          <p>You are going to delete <text id="count-client-information"></text>clients</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        {!! Form::close() !!}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
      
  
@endsection


@section('additional_scripts')

  <script type="text/javascript">

    var clientTable = $('#client-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('datatables.getClients') !!}',
      dom : 'trp',
      select : true,
      columns: [
          { data: 'rownum', name: 'rownum' },
          { data: 'name', name: 'name' },
          { data: 'address', name: 'address' },
          { data: 'primary_contact_name', name: 'primary_contact_name' },
          { data: 'primary_contact_number', name: 'primary_contact_number' },
          { data: 'actions', name: 'actions', orderable:false, searchable:false, className:'dt-body-center' },
      ],
    });

    clientTable.on('draw', function(){
      var pageInfo = clientTable.page.info();
      console.log(pageInfo);
      $('#client-result-information').text('Showing '+pageInfo.end+' to '+pageInfo.recordsDisplay+' of '+pageInfo.recordsTotal+' entries');
    });

    $("#client-entry-length").find("a").click(function(event){
      event.preventDefault();
      var entryLength = $(this).text().trim();
       clientTable.page.len(entryLength).draw();
      $('#client-entry-length-information').text('Show '+ entryLength+' entries');
    });

    // Setup text inputs and select options to each header cell
    $('#searchColumn th').each(function() {
      if ($(this).index() != 0 && $(this).index() != 5) {
        $(this).html('<input class="form-control" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
      }
      
          
    });
    //Block search input and select
    $('#searchColumn input').keyup(function() {
      clientTable.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchColumn select').change(function () {
      if($(this).val() == ""){
        clientTable.columns($(this).data('id')).search('').draw();
      }
      else{
        clientTable.columns($(this).data('id')).search(this.value).draw();
      }
    });
    //ENDBlock search input and select

    //select row event
    /*clientTable.on( 'select', function ( e, dt, type, indexes ) {
      if ( type === 'row' ) {
        var selected_client_id = clientTable.rows( indexes ).data()[0].id;
        selected_client_id_array.push(selected_client_id);

      }
    });*/
    
    clientTable.on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
    });

    $('#btn-delete-client').on('click', function(event){
      selected_client_id_array = [];
      event.preventDefault();
      //console.log(selected_client_id_array);
      var selected_client_ids = clientTable.rows('.selected').data();
      $.each( selected_client_ids, function( key, value ) {
        selected_client_id_array.push(selected_client_ids[key].id);
      });
      if(selected_client_id_array.length > 0){
        $('#body-delete-client').find('input').remove();
        $.each(selected_client_id_array, function(key, value){
          $('#body-delete-client').append('<input type="hidden" name="client_id[]" value="'+value+'" />');
        });
        $('#modal-delete-client').modal('show');
      }else{
        alert('Please select atleast one client');
      }
      console.log(selected_client_id_array);
    });

  </script>

@endsection