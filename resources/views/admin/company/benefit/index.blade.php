<div class="col-12 col-md-6 mb-3 mb-md-0">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title mb-0">Content Section Benefit</h5>
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalAddBenefit"><i class='bx bx-plus bx-sm'></i></button>
    </div>
    <div class="card-body p-0">
      <div id="benefitSlider" class="carousel slide pointer-event">
        <div class="carousel-inner">
          @foreach ($benefitSlider as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-slider="slider{{ $slider->id }}">
              <img class="d-block w-100" src="{{ Storage::url($slider->icon) }}" title="{{ $slider->name }}">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="text-dark">
                  {{ $slider->title }}
                  <a href="{{ route('admin.company.benefit.edit', $slider->id) }}" class="ml-2"><i class='bx bxs-edit-alt' ></i></a>
                </h5>
                <p class="text-dark">{{ $slider->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#benefitSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class='bx bx-chevron-left'></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#benefitSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class='bx bx-chevron-right'></i></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
