@extends('cms.parent');
@section('title' , 'show Delivery')
@section('Main-title' , 'show Delivery')
@section('sub-title' , 'show Delivery')
@section('content');
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">show Delivery</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text"disabled value="{{ $deliveries->name }}" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="address">address</label>
                  <input type="text" class="form-control"disabled value="{{ $deliveries->address }}" name="address" id="address" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="email" class="form-control"disabled name="email" value="{{ $deliveries->email }}" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">password</label>
                  <input type="password" class="form-control"disabled value="{{ $deliveries->password }}" name="password" id="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="date">date</label>
                  <input type="date" class="form-control"disabledvalue="{{ $deliveries->date }}" name="date" id="date" placeholder="Enter date">
                </div>
                <div class="form-group">
                  <label for="img">img</label>
                  <input type="text" class="form-control"disabledvalue="{{ $deliveries->img }}" name="img" id="img" placeholder="insert img">
                </div>
                <div class="form-group">
                  <label for="img">salary</label>
                  <input type="text" class="form-control" disabled value="{{ $deliveries->salary }}" name="salary" id="salary" placeholder="insert img">
                </div>





                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="submit" class="btn btn-primary">update</button> --}}
                <a href="{{ route('deliveries.index') }}" type="submit" class="btn btn-primary">index</a>
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
