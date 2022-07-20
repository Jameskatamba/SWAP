
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Datasets  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-users">
                New Dataset
              </button></h3>
            </div>
            <!-- /.card-header -->

            @isset($dataset)
            @if (count($dataset)>0)
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Data Id</th>
                  <th>Metre</th>
                  <th>Amount</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dataset as $data )
                <tr>
                  <td>#{{$data->id}}</td>
                  <td>{{$data->meter_id}}</td>
                  <td>{{$data->amount}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($data->created_at))}}</td>
                  <td>{{date("D, d M Y  h:m:s a",strtotime($data->updated_at))}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Data Id</th>
                    <th>Metre</th>
                    <th>Amount</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tfoot>
              </table>
            </div>

            @else
              <div class="alert alert danger alert-dismisible">
                  <p>No Datasets yet</p>
              </div>
            @endif
            <div class="alert alert danger alert-dismisible">
              <p>No Datasets yet</p>
            </div>
            @endisset
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

  