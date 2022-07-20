
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">



          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Roles  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-users">
                New Role
              </button></h3>  </div>
            <!-- /.card-header -->
            <div class="card-body">

              @isset($roles)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Role Id</th>
                  <th>Role Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($roles as $role )
                <tr>
                  <td>{{$role->role_id}}</td>
                  <td>{{$role->role_name}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($role->created_at))}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($role->updated_at))}}</td>
                
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                  <tr>
                    <th>Role Id</th>
                    <th>Role Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                  </tr>
                </tfoot>
              </table>
              @endisset
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

  