
@extends('layout.app')

@section('content')
<h1> REGISTRATION </h1>
<br/>
    <div class="form-group px-5">
    <form class="" action="/register" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                     @endforeach
                                                </ul>
                                            </div>
                                        @endif
        First Name: <input type="text" name="firstName" id="firstName" value="" placeholder="Juan"> <br /><br />
        Last Name: <input type="text" name="lastName" id="lastName" value="" placeholder="Castro">  <br /><br />
        Middle Name: <input type="text" name="middleName" id="middleName" value="" placeholder="Ramos"> <br /><br />
        Birthday: <input type="date" name="birthDate" id="birthDate" value="" > <br /><br />
        Email: <input type="text" name="emailAddress" id="emailAddress" value="" placeholder="asdfgh@asd.com"> <br /><br />
        Contact Detail: <input type="text" name="contactNo" id="contactNo" value="" placeholder="0909-xxx-xxxx"> <br /><br />
        Location: <input type="text" name="location" id="location" value="" placeholder="City"> <br /><br />
        Company: <input type="text" name="company" id="company" value="" placeholder="DLS-CSB"> <br /><br />
        Describe yourself: <input type="text" name="aboutDescription" id="aboutDescription" value="" placeholder="Describe yourself"> <br /><br />
        Password: <input type="password" name="password" id="password" value="" placeholder="Password"> <br /><br />
        Confirm password: <input type="password" name="confirmpassword" id="confirmpassword" value="" placeholder="Confirm Password"> <br /><br />
        Valid ID: <input type="file" name="filePath" value="">
        <div class="g-recaptcha" data-sitekey="6LcGAHAUAAAAAG5pXvyGGWTW0CgEg0o-9npi37Kb"></div>
        <button type="submit" name="button">Register</button>
    </form>
    </div>
@endsection

<script src='https://www.google.com/recaptcha/api.js'></script>
