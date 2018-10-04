@extends('projects.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
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
  
    <form method="POST" action="{{ url('/saveProj/'.$projects->projectID )}}">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="prjTitle" class="form-control" placeholder="{{ $project->prjTitle }}" value="{{ $project->prjTitle }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="jobDescription" placeholder="{{ $project->jobDescription }}" value="">{{ $project->jobDescription }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" placeholder="{{ $project->location }}" value="{{ $project->location }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <input type="text" name="role" class="form-control" placeholder="{{ $project->role }}" value="{{ $project->role }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Talent Fee</strong>
                <input type="text" name="talentFee" class="form-control" placeholder="{{ $project->talentFee }}" value="{{ $project->talentFee }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Archive post:</strong>
                <input type="checkbox" name="hidden" value="0"><br>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="display:none;">
            <div class="form-group">
                <strong>User ID</strong>
                <input type="text" name="userID" class="form-control" placeholder="{{ Auth::user()->userID}}" value="{{ Auth::user()->userID}}">
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection