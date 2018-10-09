@extends('layouts.registerapp')

<title>@yield('pageTitle') Stella Admin </title>


@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
 <!-- Form -->
 <div class="col-md-8">
 </div>
 <div class="col-md-6" style="color:black;">
        <h3>Add admin</h3><br>
        <div class="cointainer" style="color:black;">
            <div class="card card-plain">
                <form method="POST" action="/admin/addAdmin">
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
            <!-- First Name -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" value="" required >
                    </div>
            <!-- Last Name -->
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" value=""  required >
                    </div>
            <!-- Contact Number -->
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="contactNo" name="contactNo" required>
                    </div>
            <!-- Address -->
            <label>Address:</label>
            <div class="input-group input-lg">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      </span>
                  </div>
                  <input type="text" class="form-control" name="unitNo" id="unitNo" placeholder="Unit No." value=""  required>
                  <input type="text" class="form-control" name="street" id="street" placeholder="Street" value=""  required>
                  <input type="text" class="form-control" name="brgy" id="brgy" placeholder="Barangay" value=""  required>
            </div>
              <!-- Location dropdown -->
                  <div class="input-group input-lg">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              </span>
                          </div>
                          <input type="text" class="form-control" name="city" id="city" placeholder="City" value=""  required>
                          <select size="0.4" class="form-control" name="location" id="location" required>
                              <option value="" selected disabled>Select your province..</option>
                              <optgroup label="Luzon" style="color: black;">
                                  <option value="Abra">Abra</option>
                                  <option value="Albay">Albay</option>
                                  <option value="Apayo">Apayo</option>
                                  <option value="Aurora">Aurora</option>
                                  <option value="Bataan">Bataan</option>
                                  <option value="Batanes">Batanes</option>
                                  <option value="Batangas">Batangas</option>
                                  <option value="Benguet">Benguet</option>
                                  <option value="Bulacan">Bulacan</option>
                                  <option value="Cagayan">Cagayan</option>
                                  <option value="Camarines">Camarines</option>
                                  <option value="Catanduanes">Catanduanes</option>
                                  <option value="Cavite">Cavite</option>
                                  <option value="Ifugao">Ifugao</option>
                                  <option value="Ilocos">Ilocos</option>
                                  <option value="Isabela">Isabela</option>
                                  <option value="Kalinga">Kalinga</option> 
                                  <option value="La Union">La Union</option>
                                  <option value="Laguna">Laguna</option>
                                  <option value="Marinduque">Marinduque</option>
                                  <option value="Masbate">Masbate</option>
                                  <option value="Metro Manila">Metro Manila</option>
                                  <option value="Mountain Province">Mountain Province</option>
                                  <option value="Nueva Ecija">Nueva Ecija</option>
                                  <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                  <option value="Mindoro">Mindoro</option>
                                  <option value="Palawan">Palawan</option>
                                  <option value="Pampanga">Pampanga</option>
                                  <option value="Pangasinan">Pangasinan</option>
                                  <option value="Rizal">Rizal</option>
                                  <option value="Romblon">Romblon</option>
                                  <option value="Quezon">Quezon</option>
                                  <option value="Quirino">Quirino</option>
                                  <option value="Sorsogon">Sorsogon</option>
                                  <option value="Tarlac">Tarlac</option>
                                  <option value="Zambales">Zambales</option>
                              </optgroup>
                              <optgroup label="Visayas" style="color: black;">
                                  <option value="Aklan">Aklan</option>
                                  <option value="Antique">Antique</option>
                                  <option value="Biliran">Biliran</option>
                                  <option value="Bohol">Bohol</option>
                                  <option value="Capiz">Capiz</option>
                                  <option value="Cebu">Cebu</option>
                                  <option value="Eastern Samar">Eastern Samar</option>
                                  <option value="Guimaras">Guimaras</option>
                                  <option value="Iloilo">Iloilo</option>
                                  <option value="Leyte">Leyte</option>
                                  <option value="Negros">Negros</option>
                                  <option value="Samar">Samar</option>
                                  <option value="Siquijor">Siquijor</option>
                              </optgroup>
                              <optgroup label="Mindnao" style="color: black;">
                              <option value="Agusan">Agusan</option>
                                  <option value="Basilan">Basilan</option>
                                  <option value="Bukidnon">Bukidnon</option>
                                  <option value="Camiguin">Camiguin</option>
                                  <option value="Compostela Valley">Compostela Valley</option>
                                  <option value="Cotabato">Cotabato</option>
                                  <option value="Cebu">Cebu</option>
                                  <option value="Davao">Davao</option>
                                  <option value="Dinagat Islands">Dinagat Islands</option>
                                  <option value="Lanao">Lanao</option>
                                  <option value="Maguindanao">Maguindanao</option>
                                  <option value="Misamis">Misamis</option>
                                  <option value="Sarangani">Sarangani</option>
                                  <option value="Sultan Kudarat">Sultan Kudarat</option>
                                  <option value="Sulu">Sulu</option>
                                  <option value="Surigao">Surigao</option>
                                  <option value="Tawi-Tawi">Tawi-Tawi</option>
                                  <option value="Zamboanga">Zamboanga</option>
                              </optgroup>
                          </select>
                          <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code" value=""  required>
                      </div>
            <!-- Birthday -->
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control" name="birthDate" value=""  required>
                    </div>
            <!-- Email -->
                    <div class="form-group">    
                        <label>Email</label>   
                        <input type="text" class="form-control" id="emailAddress" name="emailAddress" value=""  required> 
                    </div> 
            <!-- Password -->
            <div class="form-group">    
                    <label>Password</label>   
                    <input type="password" class="form-control" id="password" name="password" value=""  required> 
                </div> 
                <!-- Repeat Password -->
                <div class="form-group">    
                        <label>Confirm Password</label>   
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value=""  required> 
                    </div> 
            <!-- Save button -->
                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button>

                </form>
            </div>
        </div>
    </div><!-- col-sm-6 closing tag -->

<!--End of form -->
</body>

@endsection