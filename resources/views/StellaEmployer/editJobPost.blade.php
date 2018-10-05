@extends('layouts.employerapp')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/employerprofile"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/SaveProj') }}">
        @csrf
        <input type="hidden" id="projectID" name="projectID" value="{{ $projects->projectID }}" />
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="prjTitle" class="form-control" value="{{ $projects->prjTitle }}" placeholder="" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="jobDescription"  >{{ $projects->jobDescription }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" value="{{ $projects->location }}"  >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <input type="text" name="role" class="form-control" value="{{ $projects->role }}"  >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Talent Fee</strong>
                <input type="text" name="talentFee" class="form-control" value="{{ $projects->talentFee }}" >
            </div>
        </div>
        


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection