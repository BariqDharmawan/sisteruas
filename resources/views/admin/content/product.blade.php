@extends('layouts.admin_master')
@section('title', 'Homepage Content')
@section('page-name', 'manageProduct')
@section('page-header', 'Product Page')
@section('content')
  <div class="alert alert-success" role="alert" style="display: none;"></div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Recomended Product</h5>
          <table class="mb-0 table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>subtitle</th>
                  <th>Image</th>
                  <th>Show on product page</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  @foreach ($product->productImage as $recomended)
                    <tr>
                      <td>{{ $recomended->product->title }}</th>
                      <td>{{ $recomended->product->subtitle }}</td>
                      <td>
                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                        data-target="#recomendedImage{{ $recomended->id }}">
                          See Image
                        </button>
                      </td>
                      <td class="recomendedProduct__isSlider">
                        <div class="position-relative form-check">
                          <label class="form-check-label">
                            <input name="product_{{ $product->id }}_is_slider" type="radio"
                            class="form-check-input" data-recommended-id="{{ $recomended->id }}" data-product-id="{{ $product->id }}"
                            value="{{ $recomended->is_slider }}" {{ $recomended->is_slider == '1' ? 'checked' : '' }}> show
                          </label>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  @foreach ($products as $product)
    @foreach ($product->productImage as $recomended)
      <div class="modal fade" id="recomendedImage{{ $recomended->id }}" tabindex="-1" role="dialog" aria-labelledby="recomendedImageLabel"
        aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-body">
                    <img src="{{ Storage::url($recomended->image) }}" width="100%" alt="{{ $recomended->product->title }}">
                  </div>
              </div>
          </div>
      </div>
    @endforeach
  @endforeach
  <script>
    $(document).ready(function() {
      $(".recomendedProduct__isSlider input").change(function() {
          let inputName = $(this).attr('name');
          $(this).val("1");
          let recommendedId = $(this).data('recommended-id');
          $(this).parents("tr").siblings().find('input[name="' + inputName +'"]').val("0");

          $.ajax({
            type: 'PUT',
            url:  "{{ url('admin/page/product-image') }}" + '/' + recommendedId,
            data: {
              product_id: $(this).data('product-id'),
              id: recommendedId,
              is_slider: $(this).val()
            },
            success: function(){
              $(".alert").text('Succesfully change product recommended status');
              $('.alert').show("fast").delay(700).hide("slow");
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
              console.log(xhr.statusText);
              console.log(textStatus);
              console.log(error);
            }
          });
      });
    });
  </script>
@endsection
