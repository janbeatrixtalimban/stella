@extends('layout.app')

@section('content')
<h4> Portfolio </h4>
<br/>
    <div class="form-group px-4">
    <form class="" action="/createPortfolio" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group px-5">
            <label for="p_title">Title:</label>
            <input type="text" class="form-control" id="p_title" name="p_title">
        </div> 
        <div class="form-group px-5">
            <label for="p_date">Date:</label>
            <input type="date" class="form-control" id="p_date" name="p_date">
        </div>   
        <div class="form-group px-5">
            <label for="p_company">Company:</label>
            <input type="text" class="form-control" id="p_company" name="p_company">
        </div>
        <div class="form-group px-5">
            <label for="p_description">Description:</label>
            <input type="text" class="form-control" id="p_description" name="p_description">
        </div> 
        <div class="form-group px-5">
            <label for="caption">Caption:</label>
            <input type="text" class="form-control" id="caption" name="caption">
        </div> 
        <div class="form-group px-5">
            <label for="image">Upload Image:</label>
            <input size="0.5" type="file" name="image" id="image" class="form-control" accept="image/jpeg, image/png">
        </div> 
                              
        
        
        <button type="submit" class=" btn btn-md btn-block btn-rounded btn-primary text-uppercase my-4">Create</button>
    </form>
    </div>
@endsection

{{-- Title: <input type="text" name="p_title" id="p_title" value=""> <br /><br />
        Date: <input type="date" name="p_date" id="p_date" value="" >  <br /><br />
        Company: <input type="text" name="p_company" id="p_company" value="" > <br /><br />
        Description: <input type="text" name="p_description" id="p_description" value="" > <br /><br /> --}}