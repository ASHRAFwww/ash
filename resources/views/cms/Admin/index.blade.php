@extends('cms.parent');
@section('title' , 'index admins')
@section('Main-title' , 'index admins')
@section('sub-title' , 'sub admins')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">admins</h3>

            </div>
            <a href="{{ route('admins.create') }}" type="submit" class="btn btn-primary" style="width: 150px; height: 50px; margin-top: 20px; margin-left: 20px" >add new admin</a>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>name</th>
                    <th>mobile</th>
                    <th>address</th>
                    <th>img</th>
                    <th>data</th>
                    <th>email</th>
                    <th>password</th>
                    <th>sitting</th>


                  </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin )


                  <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td> {{ $admin->mobile }} </td>
                    <td> {{ $admin->address }} </td>
                    <td> {{ $admin->img }} </td>
                    <td> {{ $admin->email }} </td>
                    <td> {{ $admin->data }} </td>
                    <td> {{ $admin->password }} </td>
                   <td> <div class="btn-group-vertical">
                    <button type="button" onclick="performDestroy({{ $admin->id }} ,this)" class="btn btn-danger">Delete</button>
                    <a href="{{ route('admins.edit',  $admin->id) }}" class="btn btn-warning">edit</a>
                    <a  href="{{ route('admins.show',  $admin->id) }}" type="button" class="btn btn-success">show</a>
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
          {{ $admins->links() }}

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('styles')
@endsection
@section('scripts')

<script>
    function performDestroy(id , reference ){
        confirmDestroy('/cms/admin/admins/'+id ,reference )
    }
</script>


@endsection
