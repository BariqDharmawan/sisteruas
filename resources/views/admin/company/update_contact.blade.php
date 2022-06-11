@extends('layouts.admin_master')
@section('title', 'Update Contact Company')
@section('page-name', 'update_contact_company')
@section('page-header')
  <a href="{{ url()->previous() }}" class="mr-3"><i class="pe-7s-left-arrow"></i></a>
  Update Contact Company
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form class="needs-validation" method="post" action="{{ route('admin.company.contact.update', $companyContact->id) }}" novalidate>
                  @csrf @method('PUT')
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $companyContact->email }}" required>
                        <div class="valid-feedback">
                          Wrong email format
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="telphone">telphone</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+</div>
                        </div>
                        <input type="tel" minlength="3" maxlength="15" class="form-control" id="telphone" name="telphone" placeholder="telphone" value="{{ $companyContact->telphone }}" required>
                        <div class="invalid-feedback">
                          Please provide valid phone number
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telphone">whatsapp</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+</div>
                        </div>
                        <input type="tel" minlength="3" maxlength="15" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="{{ $companyContact->whatsapp }}" required>
                        <div class="invalid-feedback">
                          Please provide valid whatsapp number
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="location">location</label>
                      <input type="text" class="form-control" id="location" name="location" placeholder="copyright" value="{{ $companyContact->location }}" required>
                      <div class="invalid-feedback">
                        Please provide a valid city.
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="address">address</label>
                      <textarea class="form-control" id="address" name="address" placeholder="address" aria-describedby="inputGroupPrepend" required>{{ $companyContact->address }}</textarea>
                      <div class="invalid-feedback">
                        Description can't be null
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit Change</button>
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
