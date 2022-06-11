@extends('layouts.admin_master')
@section('title', 'Profile Company')
@section('page-name', 'profile_company')
@section('page-header', 'Profile Company')
@section('content')
<div class="row">
  <div class="col-12 mb-5">
    <div class="card">
      <div class="card-header-tab card-header">
        <div class="card-header-title">
          <i class="header-icon lnr-bicycle icon-gradient bg-love-kiss"> </i> Company Asset
        </div>
        <ul class="nav">
          <li class="nav-item"><a data-toggle="tab" href="#tab-logo-primary" class="active nav-link">Logo Utama</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-logo-footer" class="nav-link">Logo Footer</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-favicon" class="nav-link">Favicon</a></li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab-logo-primary" role="tabpanel">
            <img src="{{ Storage::url($imageAsset->logo_menu) }}" alt="Dickson logo primary" height="70">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-upload-logo-primary">
              Click here to change
            </button>
          </div>
          <div class="tab-pane" id="tab-logo-footer" role="tabpanel">
            <img src="{{ Storage::url($imageAsset->logo_footer) }}" alt="Dickson logo secondary" height="70">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-upload-logo-secondary">
              Click here to change
            </button>
          </div>
          <div class="tab-pane" id="tab-favicon" role="tabpanel">
            <img src="{{ Storage::url($imageAsset->favicon) }}" alt="Dickson favicon" height="70">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-upload-logo-favicon">
              Click here to change
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 mb-5">
    <div class="card" id="detailCompany">
      <div class="card-header justify-content-start">
        <h2 class="card-title mb-0">Company Highlight</h2>
        <a href="{{ route('admin.company.profile.edit', $companyProfile->id) }}" class="ml-3"><i
            class="pe-7s-pen"></i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="mb-0 table table-borderless">
            <thead>
              <tr>
                <th class="text-capitalize">name</th>
                <th class="text-capitalize">title</th>
                <th class="text-capitalize">description</th>
                <th class="text-capitalize">legal text</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $companyProfile->name }}</td>
                <td>{{ $companyProfile->title }}</td>
                <td>{{ $companyProfile->description }}</td>
                <td>{{ $companyProfile->copyright }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title mb-0">Company Contact</h2>
        <a href="{{ route('admin.company.contact.edit', $companyContact->id) }}" class="ml-3"><i
            class="pe-7s-pen"></i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="mb-0 table table-borderless">
            <thead>
              <tr>
                <th class="text-capitalize">email</th>
                <th class="text-capitalize">telphone</th>
                <th class="text-capitalize">whatsapp</th>
                <th class="text-capitalize">location</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $companyContact->email }}</td>
                <td>{{ $companyContact->telphone }}</td>
                <td>{{ $companyContact->whatsapp }}</td>
                <td>{{ $companyContact->location . ", " . $companyContact->address}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title mb-0">Company Social Media</h2>
        <a href="{{ route('admin.company.social-media.edit-data') }}" class="ml-3"><i class="pe-7s-pen"></i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="mb-0 table table-borderless">
            <thead>
              <tr>
                <th class="text-capitalize">Icon</th>
                <th class="text-capitalize">Social Media</th>
                <th class="text-capitalize">Username</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($companySocial as $social)
              <tr>
                <td>
                  <img src="{{ Storage::url($social->icon) }}" alt="{{ $social->icon }} icon" height="20">
                </td>
                <td>{{ $social->social_media }}</td>
                <td>{{ $social->username}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-add-new-social">
          Add new social media
        </button>
      </div>
    </div>
  </div>
  <div class="col-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title mb-0">Admin Account</h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="mb-0 table table-borderless">
            <thead>
              <tr>
                <th class="text-capitalize">Username</th>
                <th class="text-capitalize">Password</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ Auth::user()->username }}</td>
                <td>
                  <button type="button" class="btn btn-link px-0" data-toggle="modal" data-target="#modal-change-admin">
                    Change Detail
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<div class="modal fade" id="modal-add-new-social" tabindex="-1" role="dialog" aria-labelledby="modalAddNewSocialLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new social media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.company.social-media.store') }}" id="social-icon"
          enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="social_media">Social Media Name</label>
            <input type="text" id="social_media" name="social_media" class="form-control"
              placeholder="Ex: instagram, facebook, path">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Ex: @dickson.id">
          </div>
          <div class="form-group custom-file">
            <input type="file" class="custom-file-input" id="icon" name="icon">
            <label class="custom-file-label" for="icon">Choose icon</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="social-icon">Add new social media</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-upload-logo-primary" tabindex="-1" role="dialog"
  aria-labelledby="modalUploadLogoPrimary" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Logo Primary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.company.image-asset.store') }}" id="img-upload-primary"
          enctype="multipart/form-data">
          @csrf
          <label for="file-img-primary" class="upload_image_label">
            <img src="" height="70" class="modal-upload-logo-primary-preview" alt="">
            <i class='bx bx-upload'></i>
            <span>Click to upload</span>
          </label>
          <input type="file" id="file-img-primary" class="upload_image" name="file-img-primary"
            accept=".webp, .png, image/jpeg, .svg">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="img-upload-primary">Change logo primary</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-upload-logo-secondary" tabindex="-1" role="dialog"
  aria-labelledby="modalUploadLogoSecondary" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Logo Footer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.company.image-asset.store') }}" id="img-upload-secondary"
          enctype="multipart/form-data">
          @csrf
          <label for="file-img-secondary" class="upload_image_label">
            <img src="" height="70" class="modal-upload-logo-secondary-preview" alt="">
            <i class='bx bx-upload'></i>
            <span>Click to upload</span>
          </label>
          <input type="file" id="file-img-secondary" class="upload_image" name="file-img-secondary"
            accept=".webp, .png, image/jpeg, .svg">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="img-upload-secondary">Change logo primary</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-upload-logo-favicon" tabindex="-1" role="dialog"
  aria-labelledby="modalUploadLogoFavicon" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.company.image-asset.store') }}" id="img-upload-favicon"
          enctype="multipart/form-data">
          @csrf
          <label for="change_thumbnail" class="upload_image_label">
            <img src="" height="70" class="modal-upload-logo-favicon-preview" alt="">
            <i class='bx bx-upload'></i>
            <span>Click to upload</span>
          </label>
          <input type="file" id="change_thumbnail" class="upload_image" name="file-favicon"
            accept=".webp, image/jpeg, .svg">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="img-upload-favicon">Change logo primary</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-change-admin" tabindex="-1" role="dialog" aria-labelledby="modalChangeAdmin"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change admin account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.company.profile.update', Auth::id()) }}" id="change-admin"
          enctype="multipart/form-data" autocomplete="off">
          @csrf @method('PUT')
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Ex: admin_dickson"
              autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Ex: admin_123"
              autocomplete="off">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="change-admin">Change Admin Account</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"
  charset="utf-8"></script>
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection