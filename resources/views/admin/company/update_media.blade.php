@extends('layouts.admin_master')
@section('title', 'Update Social Media Company')
@section('page-name', 'update_media_company')
@section('page-header')
  <a href="{{ url()->previous() }}" class="mr-3"><i class="pe-7s-left-arrow"></i></a>
  Update Company Social Media
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('admin.company.social-media.update-data') }}"
                id="update_company_social" novalidate>
                  @csrf
                  @foreach ($updateSocial as $social)
                    <input type="hidden" name="social_media[]" value="{{ $social->id }}">
                    <div class="form-row mb-3">
                      <div class="col-12 mb-2">
                        <img src="{{ Storage::url($social->icon) }}" class="img-preview" data-preview="img-preview{{ $social->id }}" alt="{{ $social->social_media }} icon" height="20">
                        <span class="text-capitalize">{{ $social->social_media }}</span>
                        <a href="{{ route('admin.company.social-media.destroy-data', $social->id) }}" class="btn btn-link text-danger"><i class='bx bxs-trash-alt'></i></a>
                      </div>
                      <div class="form-group row col-12">
                        <label for="name" class="text-capitalize col-2 col-form-label">
                          Username
                        </label>
                        <div class="col-10">
                          <input type="text" class="form-control" name="username[]" id="{{ $social->social_media }}"
                          placeholder="{{ $social->social_media }} username" value="{{ $social->username }}" required>
                        </div>
                        <div class="invalid-feedback">
                          Please fill the {{ $social->social_media }} username
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <span class="col-2 col-form-label">icon</span>
                        <div class="custom-file col-10 position-relative">
                          <input type="file" class="custom-file-input" data-img="img-preview{{ $social->id }}" id="customFile" accept="image/*">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <button class="btn btn-primary" type="submit">Update Social Media Company</button>
                </form>

                <script>
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
