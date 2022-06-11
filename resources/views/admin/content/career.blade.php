@extends('layouts.admin_master')
@section('title', 'Career Content')
@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.css"/>
@endsection
@section('page-name', 'careerSubmission')
@section('page-header', 'Career Submission')
@section('content')
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
      <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-resume" data-toggle="tab" href="#resume-submit">
          <span>Resume Submit</span>
        </a>
      </li>
      <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-career" data-toggle="tab" href="#career-submit">
          <span>Career Submit</span>
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane tabs-animation fade show active" id="resume-submit" role="tabpanel">
        <div class="row">
          <div class="col-12">
            <div id="accordion" class="accordion-wrapper mb-3">
              @foreach ($resumes as $resume)
                <div class="card mb-2">
                  <div id="heading{{ $resume->id }}" class="card-header">
                      <button type="button" data-toggle="collapse" data-target="#collapse{{ $resume->id }}" aria-expanded="false"
                      aria-controls="collapse{{ $resume->id }}" class="text-left m-0 p-0 btn btn-link btn-block">
                          <h5 class="m-0 p-0">
                            {{ $resume->name }}
                            <small class="float-right text-muted"><time>{{ $resume->created_at }}</time></small>
                          </h5>
                      </button>
                  </div>
                  <div data-parent="#accordion" id="collapse{{ $resume->id }}" aria-labelledby="heading{{ $resume->id }}" class="collapse show">
                    <div class="card-body">
                      <p>
                        Email :
                        <a href="mailto:{{ $resume->email }}?subject=Your Career Submission At {{ $companyProfile->name }}" target="_blank">
                          {{ $resume->email }}
                        </a>
                      </p>
                      <p>Curriculum vitae : <a target="_blank" href="{{ Storage::url($resume->resume) }}">Click to see</a></p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="col-12">
            {{ $resumes->links() }}
          </div>
        </div>
      </div>
      <div class="tab-pane tabs-animation fade" id="career-submit" role="tabpanel">
        <div class="row">
          <div class="col-12 px-0 mb-3 card">
            <div class="card-header py-0">
              <ul class="nav nav-justified">
                @foreach ($careers as $career)
                  <li class="nav-item">
                    <a data-toggle="tab" href="#tab-{{ $career->id }}" class="{{ $loop->first ? 'active' : '' }} nav-link">{{ $career->title }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                @foreach ($careers as $career)
                  <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab-{{ $career->id }}" role="tabpanel">
                    <table class="mb-0 table data-submission">
                      <thead>
                        <tr>
                          <th class="text-capitalize">fullname</th>
                          <th class="text-capitalize">email</th>
                          <th class="text-capitalize">phone</th>
                          <th class="text-capitalize">address</th>
                          <th class="text-capitalize">summary</th>
                          <th class="text-capitalize">resume</th>
                          <th class="text-capitalize">apply date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($career->careerSubmit as $submission)
                          <tr>
                            <td>{{ $submission->fullname }}</td>
                            <td>
                              <a href="mailto:{{ $submission->email }}?subject=Your Career Submission At {{ $companyProfile->name }}" target="_blank">
                                {{ $submission->email }}
                              </a>
                            </td>
                            <td>
                              <a href="tel:{{ $submission->country_code . $submission->phone }}">{{ $submission->country_code . $submission->phone }}</a>
                            </td>
                            <td>{{ $submission->address }}</td>
                            <td>
                              <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#submission{{ $submission->id }}">
                                See summary
                              </button>
                            </td>
                            <td>
                              <a class="text-primary" href="{{ Storage::url($submission->resume) }}" target="_blank">view resume</a>
                            </td>
                            <td>{{ $submission->created_at->format('d M Y') }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
  @foreach ($careers as $career)
    @foreach ($career->careerSubmit as $submission)
      <div class="modal fade" id="submission{{ $submission->id }}" tabindex="-1" role="dialog"
      aria-labelledby="submission{{ $career->$submission }}" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-capitalize">{{ $submission->fullname }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{ $submission->summary }}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endforeach
  <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.20/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".data-submission").DataTable();
    });
  </script>
@endsection
