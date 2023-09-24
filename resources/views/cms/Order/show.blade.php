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
                  <label for="address">address</label>
                  <input type="text"disabled value="{{ $orders->address }}" class="form-control" name="address" id="address" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="date">date</label>
                  <input type="text" class="form-control"disabled value="{{ $orders->date }}" name="date" id="date" placeholder="Enter date">
                </div>
                <div class="form-group">
                  <label for="isReady">isReady</label>
                  <input type="text" class="form-control"disabled name="isReady" value="{{ $orders->isReady }}" id="isReady" placeholder="Enter isReady">
                </div>
                <div class="form-group">
                  <label for="price">price</label>
                  <input type="text" class="form-control"disabled value="{{ $orders->price }}" name="price" id="price" placeholder="Enter price">
                </div>





                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="submit" class="btn btn-primary">update</button> --}}
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
@endsection
