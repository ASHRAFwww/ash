@extends('cms.parent');
@section('title' , 'Edit Orders')
@section('Main-title' , 'Edit Orders')
@section('sub-title' , 'Edit Orders')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Orders</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="address">address</label>
                  <input type="text" value="{{ $orders->address }}" class="form-control" name="address" id="address" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="date">date</label>
                  <input type="text" class="form-control" value="{{ $orders->date }}" name="date" id="date" placeholder="Enter date">
                </div>
                <div class="form-group">
                  <label for="data">isReady</label>
                  <input type="text" class="form-control" name="isReady" value="{{ $orders->isReady }}" id="isReady" placeholder="Enter isReady">
                </div>
                <div class="form-group">
                  <label for="price">price</label>
                  <input type="text" class="form-control" value="{{ $orders->price }}" name="price" id="price" placeholder="insert img">
                </div>





                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $orders->id }})" class="btn btn-primary">update</button>
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
@section('styles')
@endsection
@section('scripts')
<script>


function performUpdate(id){
    let formData = new FormData();
    formData.append('address',document.getElementById('address').value);
    formData.append('date',document.getElementById('date').value);
    formData.append('isReady',document.getElementById('isReady').value);
    formData.append('price',document.getElementById('price').value);

    storeRoute('/cms/admin/orders-update/'+id , formData);
  }
</script>
@endsection
