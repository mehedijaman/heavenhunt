@extends('admin.layouts.app',['title' => 'Property Trash'])

@section('content')
  <!-- ======================= Content Wrapper ========================= -->
  <div class="content-wrapper">
    <!-- ======================= Content Header ========================= -->
    <section class="content-header">
      <h1>
        Property
        <small>Propertys</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Property</li>
      </ol>
    </section>
    <!-- ======================= / Content Header ========================= -->


    <!-- ======================= Main Content ========================= -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="btn-group">
            <a href="/admin/property" class="btn btn-primary"><i class="fa fa-backward"></i> Back to List</a>         
            <a class="btn btn-success" id="RestoreAll"><i class="fa fa-undo"></i> Restore All</a>  
          </div>
          <a class="btn btn-default" id="Empty"><i class="fa fa-trash"></i> Empty Trash</a>
        </div>
        <div class="box-body">
          <table class="table DataTable" id="DataTrashTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>#</th>
                <th>Title</th>
                <th>Location</th>
                <th>Address</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>       
    </section>
    <!-- ======================= / Main Content ========================= -->

  </div>
  <script src="{{ asset('/js/property.js') }}"></script>
 @endsection