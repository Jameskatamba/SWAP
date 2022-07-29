
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Administrators  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-users">
                Add New Admin
              </button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @isset($users_data)
              @if (count($users_data)>0)
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Role</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>

                  @foreach ($users_data as $user )

                  <tr>
                    <td class="text-center"><img style="border:3px solid white;border-radius:50%;height: 50px;width:50px;" src="../dist/img/default.png">
                    </td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->contact}}</td>
                    <td cl>{{$user->role_name}}</td>
                    <td>
                      <span class="text-danger"  data-value='{{$user->user_id}}' ><i class="fas fa-cut"></i></span>
                      <span class="text-success" data-value='{{$user->user_id}}'> <i class="fas fa-edit"></i></span>
                    </td>

                  </tr>
                    
                  @endforeach
               
                </tbody>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
              @else

              <div class="alert alert-info">
                <p>No Data Yet..</p>
              </div>
              @endif
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

  