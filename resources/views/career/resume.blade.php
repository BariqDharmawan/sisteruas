<div class="modal" id="modal-resume">
  <div class="modal__content">
    <div class="modal__header">
      <h3 class="modal__heading">Drop Resume</h3>
      <p class="modal__subheading">We will contact you if we need you as a candidate to work in our company.</p>
      <a href="javascript:void(0);" class="modal__close"><i class='bx bx-x'></i></a>
    </div>
    <form class="modal__body" id="drop-resume" method="post" action="{{ route('customer.resume.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row mx-0">
        <div class="form__box col-12">
          <label class="form__label input-required" for="name">Name</label>
          <input type="text" class="form__input" name="name" id="name" placeholder="your name" pattern="[a-zA-Z\s]+" value="{{ old('name') }}" title="Name can only accept letter and space" required>
        </div>
        <div class="form__box col-12">
          <label class="form__label input-required" for="email">Email</label>
          <input type="email" class="form__input" name="email" minlength="4" id="email" value="{{ old('email') }}" placeholder="your email address" required>
        </div>
        <div class="form__box col-12">
          <label class="form__label form__label--file" for="resume">
            <span class="input-required">Resume</span>
            <span class="file-value"><b class="mb-1 mb-md-0 d-inline-block">Upload file</b> or drag and drop here</span>
          </label>
          <a href="javascript:void(0);" class="form__removeValue">
            <i class='bx bx-x'></i>
          </a>
          <input type="file" class="form__input form__input--file" name="resume" id="resume" accept="application/pdf, application/msword" title="Please upload a pdf or docs" required>
        </div>
      </div>
    </form>
    <div class="modal__footer">
      <div class="col-12">
        <button type="submit" class="btn-primary" form="drop-resume">Drop Resume</button>
      </div>
    </div>
  </div>
</div>
