


<div class="modal fade" id="modal-default" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add A User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body…</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade modal-warning" id="modal-logout" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are you sure to logout?</h5>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="logoutBtn">Yes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="modal-default" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add A User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body…</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="modal-users" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            

            <form role="form"  id="adminsForm" method="post" action="/handle_registration">
              @csrf
                <!-- text input -->
                <div class="form-group">
                  <label>Full Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
                </div>


                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email ...">
                </div>


                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="contact" class="form-control" placeholder="Enter Contact ...">
                </div>


              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password ...">
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Re-Enter Contact ...">
              </div>
                
                
                <!-- input states -->
                {{-- <div class="form-group">
                  <label class="control-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                    success</label>
                  <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                </div> --}}
               
                
                <!-- select -->

                @isset($roles_data)
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role_id">
                    @foreach ($roles_data as $role )
                      <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                    @endforeach
                  </select>
                </div>
                @endisset
               
                
              </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="submitAdmins">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-roles" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form role="form"  id="rolesForm" method="post" action="/handle_roles">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Role Name</label>
                <input name="role_name" type="text" class="form-control" placeholder="Enter Role Name...">
              </div>

              <div class="form-group">
                <label>Role Description</label>
                <input name="role_desc" type="text" class="form-control" placeholder="Enter Full Description...">
              </div>

              <div class="form-group">
                <label class="text-info">Permissions</label>

                {{-- <input name="role_desc" type="text" class="form-control" placeholder="Enter Full Name ..."> --}}
              </div>

              <div class="form-group row">

                <div class="col-md-4">
                  <label>Can Create</label>
                  <input type="checkbox" class="checkbox" checked name="can_create">
                 </div>

                 <div class="col-md-4">
                  <label>Can Edit</label>
                  <input type="checkbox" class="checkbox" name="can_edit">
                 </div>
      
               <div class="col-md-4">
                <label>Can Delete</label>
                <input type="checkbox" class="checkbox" name="can_delete">
               </div>

              

               
              </div>
              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitRole">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-meters" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Meter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form role="form"  id="metersForm" method="post" action="/handle_meters">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Meter Number</label>
                <input name="meter_name" type="text" class="form-control" placeholder="Enter Meter Name...">
              </div>

              @isset($charge_rates)
              <div class="form-group">
                <label>Water Charge Rate</label>
                <select class="form-control" name="rate_id">
                  @foreach ($charge_rates as $rate )
                    <option value="{{ $rate->rate_id }}">{{ $rate->unit }}</option>
                  @endforeach
                </select>
              </div>
              @endisset

              <div class="form-group row">
                <div class="col-md-4">
                 <h5>Sale Status</h5>
                
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Is Sold</label>
                <input name="is_sold" type="checkbox" >
             
                </div>
              </div>

            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitMeter">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal-rates" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Water Charge Rate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form role="form"  id="ratesForm" method="post" action="/handle_rates">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Unit Name</label>
                <input name="unit_name" type="text" class="form-control" placeholder="Enter Unit Name...">
              </div>

              <div class="form-group">
                <label>Unit Cost</label>
                <input name="unit_cost" type="number" class="form-control" placeholder="Enter Unit Cost">
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                 <h5>Rate Status</h5>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Use Rate ? </label>
                <input name="use_rate" type="checkbox" >
             
                </div>
              </div>

            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitRate">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

