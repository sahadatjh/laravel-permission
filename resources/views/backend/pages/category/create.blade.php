@extends('backend.master')
@section('main-content')
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create new role</h3>
                  <a href="{{ URL::to('admin/categorys') }}" class="btn btn-success float-right">All Categorys</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('backend.partials.messages')
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Category</button>
                    </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection


@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endpush

@push('scripts')
<!-- Select2 -->
{{-- <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endpush

@push('page_script')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endpush