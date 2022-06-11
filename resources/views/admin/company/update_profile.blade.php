@extends('layouts.admin_master')
@section('title', 'Update Profile Company')
@section('page-name', 'update_profile_company')
@section('page-header')
  <a href="{{ url()->previous() }}" class="mr-3"><i class="pe-7s-left-arrow"></i></a>
  Update Profile Company
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('admin.company.profile.update', $companyProfile->id) }}"
                id="update_profile" novalidate>
                  @csrf @method('PUT')
                    <div class="form-group">
                      <label for="name">name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $companyProfile->name }}" required>
                      <div class="invalid-feedback">
                        Please fill the company name
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="title">title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $companyProfile->title }}" required>
                      <div class="invalid-feedback">
                        Please fill the company title
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">description</label>
                      <textarea class="form-control" id="description" name="description"
                      placeholder="description" aria-describedby="inputGroupPrepend" required>{{ $companyProfile->description }}</textarea>
                      <div class="invalid-feedback">
                        Description can't be null
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="legal">copyright</label>
                      <input type="text" class="form-control" name="copyright" id="legal" placeholder="copyright" value="{{ $companyProfile->copyright }}" required>
                      <div class="invalid-feedback">
                        Please fill the company legal
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update Company Profile</button>
                </form>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

    });
</script>
@endsection
