<div class="modal fade" id="career_subheading_header" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subheading header</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_subheading_header">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_subheading_header" class="form-control" value="{{ $dynamicText->career_subheading_header }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_heading_header" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Heading header</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_heading_header">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_heading_header" class="form-control" value="{{ $dynamicText->career_heading_header }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_btn_job" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Button Find Jobs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_btn_job">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_btn_job" class="form-control" value="{{ $dynamicText->career_btn_job }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_section_value_subheading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>our value & benefit</u> subheading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_section_value_subheading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_section_value_subheading" class="form-control" value="{{ $dynamicText->career_section_value_subheading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_section_value_heading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>our value & benefit</u> heading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_section_value_heading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_section_value_heading" class="form-control" value="{{ $dynamicText->career_section_value_heading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_section_value_description" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>our value & benefit</u> description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_section_value_description">
        @csrf @method('PUT')
        <div class="form-group">
          <textarea name="career_section_value_description" rows="8" class="form-control">{{ $dynamicText->career_section_value_description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_team_subheading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>great team</u> subheading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_team_subheading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_team_subheading" class="form-control" value="{{ $dynamicText->career_team_subheading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_team_heading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>great team</u> heading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_team_heading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_team_heading" class="form-control" value="{{ $dynamicText->career_team_heading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_job_subheading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>job available</u> subheading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_job_subheading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_job_subheading" class="form-control" value="{{ $dynamicText->career_job_subheading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_job_heading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Section <u>job available</u> heading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_job_heading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_job_heading" class="form-control" value="{{ $dynamicText->career_job_heading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_resume_subheading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Drop resume subheading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_resume_subheading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_resume_subheading" class="form-control" value="{{ $dynamicText->career_resume_subheading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_resume_heading" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Drop resume heading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_resume_heading">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_resume_heading" class="form-control" value="{{ $dynamicText->career_resume_heading }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="career_resume_btn" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Drop resume button text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.career-cms.update', $dynamicText->id) }}" method="post" id="career_resume_btn">
        @csrf @method('PUT')
        <div class="form-group">
          <input type="text" name="career_resume_btn" class="form-control" value="{{ $dynamicText->career_resume_btn }}">
        </div>
        <button type="submit" class="btn btn-success btn-block">Update Text</button>
      </form>
    </div>
  </div>
</div>
