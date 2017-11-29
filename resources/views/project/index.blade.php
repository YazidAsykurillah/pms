@extends('layouts.main')

@section('page_title')
    Projects
@endsection

@section('additional_styles')

@endsection


@section('main_content')
  <h3><i class="lnr lnr-select"></i>&nbsp;Projects</h3>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="pull-left">
          <h3 class="panel-title">
            Projects List
          </h3>
        </div>
          <div class="pull-right">
            <a href="{{ url('project/create') }}" class="btn btn-xs btn-default" title="Create new project"><i class="fa fa-plus"></i>&nbsp;Create</a>
            <a href="#" class="btn btn-xs btn-danger" id="btn-delete-project" title="Delete selected projects"><i class="fa fa-minus-square"></i>&nbsp;Delete</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <div class="pms-datatable-utilities">
            <div class="pull-left">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <text id="project-entry-length-information">Show 10 entries</text> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="project-entry-length">
                  <li><a href="#">10</a></li>
                  <li><a href="#">25</a></li>
                  <li><a href="#">50</a></li>
                  <li><a href="#">100</a></li>
                </ul>
              </div>
            </div>
            <div class="pull-right">
              <text id="project-result-information">Showing 1-2 of 2 entries</text>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="table-responsive">
            <table class="table" id="project-table">
              <thead>
                <tr>
                  <th style="width:5%;">#</th>
                  <th>Client</th>
                  <th style="width:20%;">Code</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Project Manager</th>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-project">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {!! Form::open(['url'=>'project/delete', 'method'=>'post', 'id'=>'delete-project-form']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete project Confirmation</h4>
        </div>
        <div class="modal-body" id="body-delete-project">
          <p>You are going to delete <text id="count-project-information"></text></p>
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

    //Block building  project datatable up
    var projectTable = $('#project-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('datatables.getProjects') !!}',
      dom : 'trp',
      select : true,
      columns: [
          { data: 'rownum', name: 'rownum' },
          { data: 'client', name: 'client.name' },
          { data: 'code', name: 'code' },
          { data: 'name', name: 'name' },
          { data: 'description', name: 'description' },
          { data: 'project_manager', name: 'project_manager.name' },
          { data: 'actions', name: 'actions', orderable:false, searchable:false, className:'dt-body-center' },
      ],
    });
    //ENDBlock building  project datatable up

    //Block project table drawing
    projectTable.on('draw', function(){
      var pageInfo = projectTable.page.info();
      console.log(pageInfo);
      $('#project-result-information').text('Showing '+pageInfo.end+' to '+pageInfo.recordsDisplay+' of '+pageInfo.recordsTotal+' entries');
    });
    //ENDBlock project table drawing

    //Block project table toolbar dropdown length entry clicking
    $("#project-entry-length").find("a").click(function(event){
      event.preventDefault();
      var entryLength = $(this).text().trim();
       projectTable.page.len(entryLength).draw();
      $('#project-entry-length-information').text('Show '+ entryLength+' entries');
    });
    //ENDBlock project table toolbar dropdown length entry clicking

    //BLock setup text inputs and select options to each cell header
    $('#searchColumn th').each(function() {
      if ($(this).index() != 0 && $(this).index() != 6) {
        $(this).html('<input class="form-control" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
      }
          
    });
    //ENDBLock setup text inputs and select options to each cell header

    //Block search input and select
    $('#searchColumn input').keyup(function() {
      projectTable.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchColumn select').change(function () {
      if($(this).val() == ""){
        projectTable.columns($(this).data('id')).search('').draw();
      }
      else{
        projectTable.columns($(this).data('id')).search(this.value).draw();
      }
    });
    //ENDBlock search input and select

    //Block select event on table
    projectTable.on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
    });
    //ENDBlock select event on table

    //Block delete button handling
    $('#btn-delete-project').on('click', function(event){
      selected_project_id_array = [];
      event.preventDefault();
      //console.log(selected_project_id_array);
      var selected_project_ids = projectTable.rows('.selected').data();
      $.each( selected_project_ids, function( key, value ) {
        selected_project_id_array.push(selected_project_ids[key].id);
      });
      if(selected_project_id_array.length > 0){
        $('#body-delete-project').find('input').remove();
        $.each(selected_project_id_array, function(key, value){
          $('#body-delete-project').append('<input type="hidden" name="project_id[]" value="'+value+'" />');
        });
        var project_counter_plur = selected_project_id_array.length >1 ? "s" : "";
        $('#count-project-information').text(selected_project_id_array.length+' Project'+project_counter_plur);
        $('#modal-delete-project').modal('show');
      }else{
        alert('Please select atleast one project');
      }
    });
    //ENDBlock delete button handling

  </script>

@endsection