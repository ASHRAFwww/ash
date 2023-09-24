@extends('cms.parent');
@section('title' , 'create Order')
@section('Main-title' , 'create Order')
@section('sub-title' , 'create Order')

@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Creat Order</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="address">address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="date">date</label>
                  <input type="date" class="form-control" name="date" id="date" placeholder="Enter date">
                </div>
                <div class="form-group">
                  <label for="isReady">isReady</label>
                  <input type="text" class="form-control" name="isReady" id="isReady" placeholder="yes or no">
                </div>
                <div class="form-group">
                  <label for="price">price</label>
                  <input type="number" class="form-control" name="price" id="price" placeholder="Enter price">
                </div>



                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('orders.index') }}" type="submit" class="btn btn-primary">index</a>
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
      formData.append('address',document.getElementById('address').value);
      formData.append('date',document.getElementById('date').value);
      formData.append('isReady',document.getElementById('isReady').value);
      formData.append('price',document.getElementById('price').value);


      store('/cms/admin/orders' , formData);
    }

</script>
@endsection
