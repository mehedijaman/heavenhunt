@extends('admin.layouts.app',['title'=>'Properties'])

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Property
        <small>Add New Property</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Property</li>
      </ol>
    </section>


    <section class="content">
      <div class="box box-defaul">
        <div class="box-header with-border">  
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewModal"><i class="fa fa-window-restore"></i> Add Property</button>  
            <a href="/admin/property/trash" class="btn btn-danger"><i class="fa fa-trash"></i> View Trash</a>            
          </div> 
          <button class="btn btn-default pull-right" id="DeleteAll"><i class="fa fa-trash"></i> Delete All Records</button>
        </div>
        <div class="box-body">
          <table class="table DataTable" id="DataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>  
                <th>Title</th>
                <th>Location</th>
                <th>Address</th>
                <th>Category</th>
                <th>Type</th>
                <th>Price</th> 
                <th>Photo</th>
                <th>Status</th>
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
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
          

          <!-- Property Single Insert Modal -->
          <div class="modal fade NewModal" id="NewModal" tabindex="-1" role="dialog">
            <div class="" >
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  New Property
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span>
                </button>
                </div>
                <div class="modal-body">
                  {{ Form::open(array('url' => '/admin/property/store', 'class' => 'form-horizontal','id'=>'NewForm','enctype'=>'multipart/form-data')) }}
                    <div class="form-group">
                      <label for="Title" class="col-sm-1 control-label">Title</label>
                      <div class="col-sm-3">
                        <input name="Title" type="text" class="form-control" id="Title" placeholder="e.g. Mehedi Jaman">
                      </div> 
                      
                      <label for="For" class="col-sm-1 control-label">For</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="For">
                          <option value="Rent">Rent</option>
                          <option value="Sale">Sale</option>
                        </select>
                      </div>

                      <label for="Type" class="col-sm-1 control-label">Type</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="Type">
                          <option value="Apartment">Apartment</option>
                          <option value="House">House</option>
                          <option value="Commercial">Commercial</option>
                          <option value="Garage">Garage</option>
                          <option value="Lot">Lot</option>
                        </select>
                      </div>    
                    </div>

                    <div class="form-group">
                      <label for="Category" class="col-sm-1 control-label">Category</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="Category">
                          <option value="Furnished">Furnished</option>
                          <option value="Unfurnished">Unfurnished</option>
                          <option value="Semifurnished">Semifurnished</option>
                          <option value="Serviced">Serviced</option>
                        </select>
                      </div> 
                      
                      <label for="For" class="col-sm-1 control-label">For</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="For">
                          <option value="Rent">Rent</option>
                          <option value="Sale">Sale</option>
                        </select>
                      </div>

                      <label for="Type" class="col-sm-1 control-label">Type</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="Type">
                          <option value="Apartment">Apartment</option>
                          <option value="House">House</option>
                          <option value="Commercial">Commercial</option>
                          <option value="Garage">Garage</option>
                          <option value="Lot">Lot</option>
                        </select>
                      </div>    
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-4">
                        <input type="submit" name="submit" value="Add New Property" class="btn btn-primary">
                        <button type="button" class="btn bg-default">Reset</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  {{ Form::close() }}
                </div>                
              </div>
            </div>
          </div>

          <!-- Property Single Edit Modal -->
          <div class="modal fade modal-info EditModal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  Edit
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span>
                  </button>
                </div>
                <div class="modal-body">
                  {{ Form::open(array('url' => '/admin/property/update', 'class' => 'form-horizontal','id'=>'EditForm','enctype'=>'multipart/form-data')) }}

                  {{ Form::close() }}
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="/js/property.js"></script>
 @endsection