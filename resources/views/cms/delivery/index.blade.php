@extends('cms.parent');
@section('title' , 'index deliveries')
@section('Main-title' , 'index deliveries')
@section('sub-title' , 'sub deliveries')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">deliveiries</h3>

            </div>
            <a href="{{ route('deliveries.create') }}" type="submit" class="btn btn-primary" style="width: 150px; height: 50px; margin-top: 20px; margin-left: 20px" >add new delivery</a>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>name</th>
                    <th>address</th>
                    <th>email</th>
                    <th>password</th>
                    <th>date</th>
                    <th>img</th>
                    <th>salary</th>
                    <th>sitting</th>


                  </tr>
                </thead>
                <tbody>
                    @forelse ($deliveries as $delivery )


                  <tr>
                    <td>{{ $delivery->id }}</td>
                    <td>{{ $delivery->name }}</td>
                    <td> {{ $delivery->address }} </td>
                    <td> {{ $delivery->email }} </td>
                    <td> {{ $delivery->password }} </td>
                    <td> {{ $delivery->date }} </td>
                    <td> {{ $delivery->img }} </td>
                    <td> {{ $delivery->salary }} </td>
                   <td> <div class="btn-group-vertical">
                    <button type="button" onclick="performDestroy({{ $delivery->id }} ,this)" class="btn btn-danger">Delete</button>
                    <a href="{{ route('deliveries.edit',  $delivery->id) }}" class="btn btn-warning">edit</a>
                    <a  href="{{ route('deliveries.show',  $delivery->id) }}" type="button" class="btn btn-success">show</a>
                  </div></td>
                      </div>

                  </tr>
                  @empty
                  <tr>
                   <td colspan="7">no delivers define </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card -->
          {{ $deliveries->links() }}

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('styles')
@endsection
@section('scripts')

<script>
    function performDestroy(id , reference ){
        confirmDestroy('/cms/admin/deliveries/'+id ,reference )
    }
</script>


@endsection
