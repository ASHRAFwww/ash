@extends('cms.parent');
@section('title' , 'create Admin')
@section('Main-title' , 'create Admin')
@section('sub-title' , 'create Admin')

@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Creat Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="mobile">mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="address">address</label>
                  <input type="email" class="form-control" name="address" id="address" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="img">img</label>
                  <input type="password" class="form-control" name="img" id="img" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="data">data</label>
                  <input type="text" class="form-control" name="data" id="data" placeholder="Enter data">
                </div>
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="insert img">
                </div>
                <div class="form-group">
                  <label for="password">password</label>
                  <div class="input-group">
                    <input type="number" class="form-control" name="password" id="password" placeholder="Enter salary">


                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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

@section('scripts')
<script>
   function performStore(){
      let formData = new FormData();
      formData.append('name',document.getElementById('name').value);
      formData.append('mobile',document.getElementById('mobile').value);
      formData.append('address',document.getElementById('address').value);
      formData.append('img',document.getElementById('img').value);
      formData.append('data',document.getElementById('data').value);
      formData.append('email',document.getElementById('email').value);
      formData.append('password',document.getElementById('password').value);

      store('/cms/admin/admins' , formData);
    }

</script>
@endsection
