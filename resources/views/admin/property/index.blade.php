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

                    <div class="box box-default box-solid">
                      <div class="box-header with-border">
                        Basic Information
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Title" class="col-sm-1 control-label">Title</label>
                          <div class="col-sm-3">
                            <input name="Title" type="text" class="form-control" id="Title" placeholder="Property Title">
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
                          
                          <label for="Building Age" class="col-sm-1 control-label">Building Age</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="BuildingAge">
                              <option value="1">0-1 Years</option>
                              <option value="5">0-5 Years</option>
                              <option value="10">0-10 Years</option>
                              <option value="15">0-15 Years</option>
                              <option value="20">0-20 Years</option>
                            </select>
                          </div>

                          <label for="Area" class="col-sm-1 control-label">Area</label>
                          <div class="col-sm-3">
                            <input name="Area" type="text" class="form-control" id="Area" placeholder="SqFt">
                          </div>    
                        </div>

                        <div class="form-group">
                          <label for="Price" class="col-sm-1 control-label">Price</label>
                          <div class="col-sm-3">
                            <input name="Price" type="text" class="form-control" id="Price" placeholder="">
                          </div>
                          
                          <label for="Room" class="col-sm-1 control-label">Room</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="Room">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>

                         <label for="Bedroom" class="col-sm-1 control-label">Bedroom</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="Bedroom">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Bathroom" class="col-sm-1 control-label">Bathroom</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="Bathroom">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>
                          
                          <label for="Balcony" class="col-sm-1 control-label">Balcony</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="Balcony">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>

                          <label for="Garage" class="col-sm-1 control-label">Garage</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="Garage">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="box box-default box-solid">
                      <div class="box-header">Detailed Information</div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Description" class="col-sm-2 control-label">Description</label>
                          <div class="col-sm-10">
                            <textarea name="Description" id="Description" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="box box-default box-solid">
                      <div class="box-header">Location</div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Location" class="col-sm-2 control-label">Location</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="Location" id="Location">
                          </div>

                          <label for="Address" class="col-sm-2 control-label">Address</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="Address" id="Address">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="GoogleMapLocation" class="col-sm-2 control-label">Google Map Location (Optional)</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="GoogleMapLocation" id="GoogleMapLocation">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="box box-default box-solid">
                      <div class="box-header with-border">
                        Features
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Parking" class="col-sm-2 control-label">Parking Lot</label>
                          <div class="col-sm-1">
                            <select name="Parking" id="Parking" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="Pool" class="col-sm-2 control-label">Swimming Pool</label>
                          <div class="col-sm-1">
                            <select name="Pool" id="Pool" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="CentralHeating" class="col-sm-2 control-label">Central Heating</label>
                          <div class="col-sm-1">
                            <select name="CentralHeating" id="CentralHeating" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="AC" class="col-sm-2 control-label">AC</label>
                          <div class="col-sm-1">
                            <select name="AC" id="AC" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="TV" class="col-sm-2 control-label">TV</label>
                          <div class="col-sm-1">
                            <select name="TV" id="TV" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="Iron" class="col-sm-2 control-label">Laundry Room</label>
                          <div class="col-sm-1">
                            <select name="Iron" id="Iron" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="Alarm" class="col-sm-2 control-label">Alarm</label>
                          <div class="col-sm-1">
                            <select name="Alarm" id="Alarm" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="SeatingPlace" class="col-sm-2 control-label">Places to  Seat</label>
                          <div class="col-sm-1">
                            <select name="SeatingPlace" id="SeatingPlace" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="WindowCovering" class="col-sm-2 control-label">Window Covering</label>
                          <div class="col-sm-1">
                            <select name="WindowCovering" id="WindowCovering" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="Wifi" class="col-sm-2 control-label">Wifi</label>
                          <div class="col-sm-1">
                            <select name="Wifi" id="Wifi" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="Jacuzzi" class="col-sm-2 control-label">Jacuzzi</label>
                          <div class="col-sm-1">
                            <select name="Jacuzzi" id="Jacuzzi" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>

                          <label for="DoubleBed" class="col-sm-2 control-label">Double Bed</label>
                          <div class="col-sm-1">
                            <select name="DoubleBed" id="DoubleBed" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="Gym" class="col-sm-2 control-label">Gym</label>
                        <div class="col-sm-1">
                          <select name="Gym" id="Gym" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>

                        <label for="Telephone" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-1">
                          <select name="Telephone" id="Telephone" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>                     
                      </div>
                    </div>

                    <div class="box box-default box-solid">
                      <div class="box-header">Property Gallery</div>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Photo1" class="col-sm-2 control-label">Photos</label>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="Photo1" name="Photo1">
                          </div>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="Photo1" name="Photo2">
                          </div>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="Photo1" name="Photo3">
                          </div>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="Photo1" name="Photo4">
                          </div>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="Photo1" name="Photo5">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="FloorPlan" class="col-sm-2 control-label">Floor Plan</label>

                          <div class="col-sm-2">
                            <input type="file" class="form-control" id="FloorPlan" name="FloorPlan">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="VideoLink" class="col-sm-2 control-label">Youtube Video Link</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="VideoLink" id="VideoLink">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="IsFeatured" class="col-sm-2 control-label">Featured ?</label>

                      <div class="col-sm-2">
                        <select name="IsFeatured" id="IsFeatured" class="form-control">
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>

                      <label for="Status" class="col-sm-2 control-label">Status</label>

                      <div class="col-sm-2">
                        <select name="Status" id="Status" class="form-control">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
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
        </div>
      </div>
    </section>
  </div>

  <script src="/js/property.js"></script>
 @endsection