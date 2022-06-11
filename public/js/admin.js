$(document).ready(function() {
  $.ajaxSetup({ //make all page ajax-able
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var path = window.location.href;
  $("nav a").each(function() {
    if (this.href === path) {
      $(this).addClass('nav__link--active');
    }
  });
  $("input, textarea")
  .not('[type="file"], [type="search"], .amsify-suggestags-input, input[name="_method"], input[name="_token"], [type="hidden"]')
  .prop('required', true);

  $('#tab-meta-description .btn-edit').click(function() { //click .btn-edit trigger #tab-meta-description contentEditable
    var tag = document.getElementById("description-editable");
    var setpos = document.createRange();
    var set = window.getSelection();
    setpos.setStart(tag.childNodes[0], 0);
    setpos.collapse(true);
    set.removeAllRanges();
    set.addRange(setpos);
    tag.focus();
  });

  $("#update_contact_company input[name='telphone']").on('input propertychange paste', function(){
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
        this.value = this.value.replace(reg, '');
    }
  });

  $("#profile_company button[data-target^='#modal-upload-logo']").click(function() {
    let modalDestination = $(this).attr('data-target').replace('#', '');

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("img." + modalDestination + "-preview").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $(".modal#" + modalDestination).find("form[id^='img-upload'] input[type='file']").change(function() {
      if ($(this).val().length != 0) {
        let imgName = $(this).val().replace(/^.*\\/, '');
        $(this).prev().find("span").text(imgName);
        readURL(this);
      }
      else {
        $(this).prev().find("span").text("Click to upload");
        $("img." + modalDestination + "-preview").attr('src', "");
      }
    });
  });

  $("#our_career #accordion .card-header button[aria-expanded='true']").find(".bx-caret-down").addClass('rotate-min-180');
  $("#our_career #accordion .card-header button").click(function() {
    if ($(this).parent().next().hasClass('show')) {
      $(this).find(".bx-caret-down").removeClass('rotate-min-180');
    }
    else {
      $(this).find(".bx-caret-down").addClass('rotate-min-180');
    }
  });

  $("#manageHomepage .btn-edit-dynamicText").click(function() {
    let valueField = $(this).prev().text();
    let elementName = $(this).data("target").replace('#', '');
    let textToEdit = $(this).parent().prev().find('.btn-link').text();
    $(".modal-edit-dynamicText").attr({ //change id modal
      'id' : elementName,
      'aria-labelledby' : elementName + 'Label'
    });
    $(".modal-edit-dynamicText#" + elementName).find("form").attr('id', 'form_update_' + elementName);
    $(".modal-edit-dynamicText#" + elementName).find("form#form_update_" + elementName).find('.form-group input, .form-group textarea')
    .attr({
      'name' : elementName,
      'id' : elementName
    });
    $(".modal-edit-dynamicText#" + elementName).find('.modal-title').text(textToEdit);
    $(".modal-edit-dynamicText#" + elementName).find("form#form_update_" + elementName)
    .find('.form-group input[name="' + elementName + '"]').val(valueField);
    $(".modal-edit-dynamicText#" + elementName).find(".modal-footer button[type='submit']").attr('form', 'form_update_' + elementName);
  });

  $(".change-page-img input[type='file'][name^='change_']").change(function() {
    let imgName = $(this).val().replace(/^.*\\/, '');
    $(this).siblings("span").text(imgName);
    $(this).parents("form").submit();
  });

  $("#company_product .alert-success").delay(600).hide("slow");
  $("#company_product .add_documentDetail").click(function() {
    $("#pickIconFirst")
    .after(
      '<hr>' +
      '<div class="form-group">' +
      '<textarea name="description[]" rows="8" class="form-control" placeholder="Description Detail"></textarea></div>' +
      '<div class="form-group">' +
        '<input type="text" class="form-control" name="text[]" placeholder="Title Detail">' +
      '</div>' +
      '<div class="form-group">' +
        '<div class="custom-file">' +
          '<input type="file" name="icon[]" class="custom-file-input" accept="image/*" required>' +
          '<label class="custom-file-label">Pick Icon</label>' +
        '</div>' +
      '</div>'
    );
  });
  $("#edit_product .add_documentDetail").click(function() {
    $(this).prev().after(
      '<hr>' +
      '<input type="hidden" name="id[]">' +
      '<div class="form-group">' +
        '<input type="text" class="form-control" name="text[]" placeholder="Text Detail">' +
      '</div>' +
      '<div class="form-group">' +
        '<textarea name="description[]" rows="6" class="form-control" placeholder="Description Detail"></textarea>' +
      '</div>' +
      '<div class="form-group">' +
        '<div class="custom-file">' +
          '<input type="file" class="custom-file-input" name="icon[]" accept="image/*" required>' +
          '<label class="custom-file-label">Add icon</label>' +
        '</div>' +
      '</div>'
    );
  });

  function thumbnailPreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $(".thumbnail-preview").attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("body[id*='_page_meta'] input[type='file']").change(function() {
    if ($(this).val().length != 0) {
      let imgName = $(this).val().replace(/^.*\\/, '');
      $(this).prev().find("span").text(imgName);
      thumbnailPreview(this);
    }
    else {
      $(this).prev().find("span").text("Click to upload");
      $(".thumbnail-preview").attr('src', "");
    }
  });

  //general plugin
  bsCustomFileInput.init();
  $("#our_career textarea[name='job_detail']").summernote({
    placeholder: 'Describe the job detail',
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $("#our_career textarea[name='job_desc']").summernote({
    placeholder: 'What is the desc of the job?',
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $("#manageHomepage #modalFreeSample textarea[name='longDescription']").summernote({
    placeholder: 'Long Description here',
    height: 150,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $("#manageCareerpage textarea[name='career_section_value_description']").summernote({
    height: 250,
    placeholder: 'Update text here',
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $('#company_product #product_content, #edit_product #product_content').summernote({
    placeholder: 'Place your product content here',
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

  function iconPreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        let imgUploaded = $("input[accept='image/*']").data('img');
        $(".img-preview[data-preview='" + imgUploaded).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("input[accept='image/*']").change(function() {
    iconPreview(this);
  });
});
