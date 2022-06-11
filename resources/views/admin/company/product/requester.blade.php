@extends('layouts.admin_master')
@section('title', 'Request Product')
@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('page-name', 'request_product')
@section('page-header', 'Request Product')
@section('content')
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="requester">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Product requested</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Address</th>
                  <th class="text-center">From Company</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Request At</th>
                  <th class="text-center">Change Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($requesters as $requester)
                  <tr>
                    <td class="text-center text-muted">{{ $requester->id }}</td>
                    <td class="text-center">{{ $requester->requester_name }}</td>
                    <td class="text-center">{{ $requester->product->title }}</td>
                    <td class="text-center">{{ $requester->requester_email }}</td>
                    <td>{{ $requester->requester_address }}</td>
                    <td class="text-center">{{ $requester->requester_company }}</td>
                    <td class="text-center">
                      @if ($requester->status == 'done')
                        <div class="mb-2 mr-2 badge badge-pill badge-success">Done</div>
                      @else
                        <div class="mb-2 mr-2 badge badge-pill badge-secondary">Pending</div>
                      @endif
                    </td>
                    <td class="text-center">{{ $requester->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                      <a href="{{ route('admin.company.request-product.edit', $requester->id) }}" class="mb-2 mr-2 btn btn-link">change</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script>
    $("#requester").DataTable();
    $(".alert-success").delay(600).hide("slow");
    $("#requester_wrapper #requester_length label, #requester_wrapper #requester_filter label").addClass('d-flex align-items-center mb-3');
    $("#requester_wrapper #requester_filter input[type='search']").addClass('form-control form-control-sm');
    $("#requester_wrapper select[name='requester_length']").addClass('custom-select custom-select-sm mx-3');
  </script>
@endsection
