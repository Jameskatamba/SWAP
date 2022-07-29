<?php

function filterRole(int $role):string{
  switch ($role) {
    case 111:
      return "Create,Edit,Delete";
    case 100:
      return "Create Only";
    case 110:
      return "Create and Edit";
    case 101:
      return "Create and Delete";
    default:
    return "No permissions";
  }

}
?>

@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">



          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Roles  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-roles">
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
                  <th>Permissions</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($roles as $role )
                <tr>
                  <td>{{$role->role_id}}</td>
                  <td>{{$role->role_name}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($role->created_at))}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($role->updated_at))}}</td>

                  <td>{{ 

                  filterRole(
                    $role->permissions
                  )
                  
                  }}</td>
                  {{-- <td>
                      {{$role->permissions==111?"Create,Edit,Delete":""}}
                      {{$role->permissions==101?"Create,Delete":""}}
                      {{$role->permissions==110?"Create,Edit":""}}
                      {{$role->permissions==100?"Create":"" }} 
                </td> --}}
                  <td>
                    <span class="text-danger"  data-value='{{$role->role_id}}' ><i class="fas fa-cut"></i></span>
                    <span class="text-success" data-value='{{$role->role_id}}'> <i class="fas fa-edit"></i></span>
                  </td>
                
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                  <tr>
                    <th>Role Id</th>
                    <th>Role Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Permissions</th>
                    <th>Actions</th>
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

  