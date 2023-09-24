@extends('cms.parent');
@section('title' , 'Edit Admins')
@section('Main-title' , 'Edit Admins')
@section('sub-title' , 'Edit Admins')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Admins</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" value="{{ $admins->name }}" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="mobile">mobile</label>
                  <input type="text" class="form-control" value="{{ $admins->mobile }}" name="mobile" id="mobile" placeholder="Enter mobile">
                </div>
                <div class="form-group">
                  <label for="data">data</label>
                  <input type="text" class="form-control" name="data" value="{{ $admins->data }}" id="data" placeholder="Enter data">
                </div>
                <div class="form-group">
                  <label for="img">img</label>
                  <input type="text" class="form-control" value="{{ $admins->img }}" name="img" id="img" placeholder="insert img">
                </div>
                <div class="form-group">
                    <div class="form-group">
                      <label for="email">email</label>
                      <input type="email" class="form-control" value="{{ $admins->email }}" name="email" id="email" placeholder="Enter email">
                    </div>
                  <label for="password">password</label>
                  <input type="password" class="form-control" value="{{ $admins->password }}" name="password" id="password" placeholder="Enter password">
                </div>
                  <label for="address">address</label>
                  <input type="text" class="form-control" value="{{ $admins->address }}" name="address" id="address" placeholder="Enter address">
                </div>






                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $admins->id }})" class="btn btn-primary">update</button>
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
<script>


function performUpdate(id){
    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('address',document.getElementById('address').value);
    formData.append('img',document.getElementById('img').value);
    formData.append('data',document.getElementById('data').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('password',document.getElementById('password').value);

    storeRoute('/cms/admin/admins-update/'+id , formData);
  }
</script>
@endsection
