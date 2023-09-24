@extends('cms.parent');
@section('title' , 'index oeders')
@section('Main-title' , 'index oeders')
@section('sub-title' , 'sub oeders')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">oeders</h3>

            </div>
            <a href="{{ route('orders.create') }}" type="submit" class="btn btn-primary" style="width: 150px; height: 50px; margin-top: 20px; margin-left: 20px" >add new order</a>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>address</th>
                    <th>date</th>
                    <th>isReady</th>
                    <th>price</th>
                    <th>sitting</th>


                  </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order )


                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->address }}</td>
                    <td> {{ $order->date }} </td>
                    <td> {{ $order->isReady }} </td>
                    <td> {{ $order->price }} </td>


                   <td> <div class="btn-group-vertical">
                    <button type="button" onclick="performDestroy({{ $order->id }} ,this)" class="btn btn-danger">Delete</button>
                    <a href="{{ route('orders.edit',  $order->id) }}" class="btn btn-warning">edit</a>
                    <a  href="{{ route('orders.show',  $order->id) }}" type="button" class="btn btn-success">show</a>
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
          {{ $orders->links() }}

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('styles')
@endsection
@section('scripts')

<script>
    function performDestroy(id , reference ){
        confirmDestroy('/cms/order/oeders/'+id ,reference )
    }
</script>


@endsection
