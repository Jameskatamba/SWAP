@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">



          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rates  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-meters">
                New Meter
              </button></h3>  </div>
            <!-- /.card-header -->
            <div class="card-body">

              @isset($meters)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Meter Id</th>
                  <th>Meter Number</th>
                  <th>Callibration</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($meters as $meter )
                <tr>
                  <td>#{{$meter->rate_id}}</td>
                  <td>{{$meter->unit}}</td>
                  <td>{{$meter->unit_cost}}</td>
                  <td><span><input type="checkbox"{{ $rate->in_use==1?'checked':""}}/></span></td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($meter->created_at))}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($meter->updated_at))}}</td>
                  

                    <td>
                        <span class="text-danger"  data-value='{{$rate->rate_id}}' ><i class="fas fa-cut"></i></span>
                        <span class="text-success" data-value='{{$rate->rate_id}}'> <i class="fas fa-edit"></i></span>
                      </td>
                 
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                  <tr>
                    <th>Role Id</th>
                    <th>Unit</th>
                    <th>Unit Cost(UGX)</th>
                    <th>Usage</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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

  