@extends('cms.parent');
@section('title' , 'show Admin')
@section('Main-title' , 'show Admin')
@section('sub-title' , 'show Admin')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">show Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text"disabled value="{{ $admins->name }}" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="mobile">mobile</label>
                  <input type="text" class="form-control"disabled value="{{ $admins->mobile }}" name="mobile" id="mobile" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="address">address</label>
                  <input type="text" class="form-control"disabled name="address" value="{{ $admins->address }}" id="address" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="data">data</label>
                  <input type="text" class="form-control"disabled value="{{ $admins->data }}" name="data" id="data" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="email" class="form-control"disabled value="{{ $admins->email }}" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">password</label>
                  <input type="password" class="form-control"disabled value="{{ $admins->password }}" name="password" id="password" placeholder="insert img">
                </div>
                <div class="form-group">
                  <label for="img">img</label>
                  <input type="text" class="form-control"disabled value="{{ $admins->img }}" name="img" id="img
                  " placeholder="insert img">
                </div>






                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="submit" class="btn btn-primary">update</button> --}}
                <a href="{{ route('admins.index') }}" type="submit" class="btn btn-primary">index</a>
</div>
            </form>
          </div>
          <!-- /.card -->

          <!-- general form elements -->

          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div>
  </section>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
