@if (session('id_perusahaan')!==null)
  <script>window.location.href="dashboard"</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adhimix - Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Free HTML5 Website Template by uicookies.com" />
  <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="uicookies.com" />
  <link href="public/assets/img/logo.png" rel="icon">
  <link href="public/assets/img/logo.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="public/assets-landing/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/assets-landing/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="public/assets-landing/css/icomoon.css">
  <link rel="stylesheet" href="public/assets/css/landing.css">
  <link rel="stylesheet" href="{{ asset('public/assets/fonts/font-hlv.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Niramit:400,400i,700,700i" rel="stylesheet">
  <!--
  <link rel="stylesheet" href="public/assets-landing/css/style.css">
  <link rel="stylesheet" href="public/assets-landing/css/styles.css">
-->
</head>

<body>
  <nav class="navbar navbar-expand-lg probootstrap-navabr-dark" id="nav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('public/assets/img/logo-main.png') }}" alt=""></a>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="icon"><i class="fas fa-mobile-alt"></i></div>
          <div class="sub">
            <label>Call Us</label>
            <span>1500-635</span>
          </div>
        </li>
        <li class="nav-item">
          <div class="icon"><i class="far fa-building"></i></div>
          <div class="sub">
            <label>Office Hour</label>
            <span>Monday-Friday 8.00 - 17.00</span>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <section class="probootstrap-cover" style="background: url({{ asset('') }}public/assets-landing/images/01_.jpg);background-size: cover;">
    <div class="row">
      <div class="container">
        <div class="row probootstrap-vh-100 align-items-center text-center">
          <div class="col-sm">
            <div class="probootstrap-text">
              @if (session('success')!==null)
              <div class="alert alert-success" style="border-radius: 30px;">
                <a href="#" class="close" style="margin-top: 3px" data-dismiss="alert" aria-label="close">&times;</a>
                Perusahaan anda telah terdaftar, cek email untuk konfirmasi.
              </div>
              @endif

              @if (session('error')!==null)
              <div class="alert alert-danger" style="border-radius: 30px;">
                <a href="#" class="close" style="margin-top: 3px" data-dismiss="alert" aria-label="close">&times;</a>
                Username atau password salah!
              </div>
              @endif

              <h4 class="probootstrap-heading text-white cf">Build A Better Way</h4>
              <div class="probootstrap-subheading mb-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
              </div>
              <p>
                <button class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#login">Perusahaan sudah terdaftar</button>
                <button class="btn btn-primary btn-outline-white mb-2" data-toggle="modal" data-target="#signupvendor">Daftarkan Perusahaan</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>


  <div class="modal fade modal-login" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="logo-container">
              <img src="{{ asset('public/assets/img/logo-main.png') }}">
              <label>Masukkan Akun Perusahaan Anda</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <img src="{{ asset('public/assets/img/bg-login-header.jpg') }}">
              </div>
            <div class="col-lg-12">
              <form class="form-container" method="post" action="{{ url('login') }}">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control" name="" placeholder="Username">
                </div>
                <div class="form-group">  
                  <input type="password" name="password" class="form-control" name="" placeholder="Password">
                </div>  
                <div class="btn-container">
                  <button type="submit" class="btn btn-primary" style="border-radius: 0px;padding: 15px; width: 350px;margin-top: 20px;color: white">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade modal-login" id="signupvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="logo-container">
              <img src="{{ asset('public/assets/img/logo-main.png') }}">
            </div>
          </div>
        </div>
        <hr>
        <form id="regForm" action="{{ url('sign-up') }}" method="post">
          @csrf
          <div class="tab">
            <div class="card">
              <div class="card-footer">
                <h3>Data Perusahaan</h3>
              </div>
              <div class="card-body">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" onkeyup="cariPerusahaan()" style="height: 40px;" autocomplete='off' name="nama_perusahaan">
                        <small style="color: red" id="msgPerusahaan" class="hide">Perusahaan telah terdaftar</small>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" id="alamat" required="" style="resize: none;" name="alamat" autocomplete='off' ></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control" required="">
                              <option value="">--Provinsi--</option>
                              <option value="Provinsi">Provinsi</option>
                              <option value="Provinsi">Provinsi 2</option>
                              <option value="Provinsi">Provinsi 3 </option>
                              <option value="Provinsi">Provinsi 4</option>
                              <option value="Provinsi">Provinsi 5</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Kota</label>
                            <select name="kota" id="kota" class="form-control" required="">
                              <option value="">--Kota--</option>
                              <option value="Kota">Kota</option>
                              <option value="Kota">Kota 2</option>
                              <option value="Kota">Kota 3 </option>
                              <option value="Kota">Kota 4</option>
                              <option value="Kota">Kota 5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Email Perusahaan</label>
                        <input type="email" class="form-control" id="email" onkeyup="cariEmail()" style="height: 40px;" autocomplete='off' name="email_perusahaan">
                        <small class="hide" style="color: red" id="msgEmail">Email tersebut telah terdaftar</small><br class="hide" id="brnya">
                        <small style="color: blue" id="msgEmail">Verifikasi akan dikirim ke email tersebut</small>
                      </div>
                      <div class="form-group">
                        <label>No Telepon Perusahaan</label>
                        <input type="number" class="form-control" style="height: 40px;" autocomplete='off'  name="telp_perusahaan">
                      </div>
                      <div class="form-group">
                        <label>No Rekening Perusahaan</label>
                        <input type="text" class="form-control" id="norek" style="height: 40px;" autocomplete='off' name="rek_perusahaan">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab">
            <div class="card">
              <div class="card-footer">
                <h3>Data Admin</h3>
              </div>
              <div class="card-body">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="text" class="form-control" style="height: 40px;" autocomplete='off' name="nama_admin">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" onkeyup="cariUsername()" id="username" style="height: 40px;" autocomplete='off' name="username">
                        <small class="hide" id="msgUsername" style="color: red">Username telah digunakan</small>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" style="height: 40px;" autocomplete='off' name="password">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="email" class="form-control" style="height: 40px;" autocomplete='off' name="jabatan">
                      </div>
                      <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" class="form-control" style="height: 40px;" autocomplete='off'  name="telp_pic">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div style="overflow:auto;margin-top: 10px;">
            <div style="float:right;">
              <button type="button" class="btn btn-default" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('') }}public/assets/js/sweetalert.js"></script>
<script src="{{ asset('') }}public/assets-landing/js/jquery-1.12.4.js"></script>
<script src="{{ asset('') }}public/assets-landing/js/popper.min.js"></script>
<script src="{{ asset('') }}public/assets-landing/js/bootstrap.min.js"></script>
<script src="{{ asset('') }}public/assets-landing/js/main.js"></script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  if ($("#norek").val()=='') {
    $("#norek").val('-');
  }
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  c = x[currentTab].getElementsByTagName("textarea");

  z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }

    if ($("#alamat").val()=='') {
      $("#alamat").addClass('invalid');
    }
    if ($("#provinsi").val()=='') {
      $("#provinsi").addClass('invalid');
    }
    if ($("#kota").val()=='') {
      $("#kota").addClass('invalid');
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function cariPerusahaan() {
  if ($("#nama_perusahaan").val()!=='') {

    $.ajax({
      type: "GET",
      url: "{{ url('api/get-perusahaan/') }}/"+$("#nama_perusahaan").val(),
      success: function (data) {
        if (data=='ada') {
          $("#nextBtn").prop('disabled',true);
          $("#msgPerusahaan").removeClass('hide');
        }else{
          $("#nextBtn").prop('disabled',false);
          $("#msgPerusahaan").addClass('hide');
        }
      }
    }); 
  }else{

    $("#nextBtn").prop('disabled',false);
    $("#msgPerusahaan").addClass('hide');
  }
}

function cariEmail() {
  if ($("#email").val()!=='') {

    $.ajax({
      type: "GET",
      url: "{{ url('api/get-email/') }}/"+$("#email").val(),
      success: function (data) {
        if (data=='ada') {
          $("#nextBtn").prop('disabled',true);
          $("#msgEmail").removeClass('hide');
          $("#brnya").removeClass('hide');
        }else{
          $("#brnya").addClass('hide');
          $("#nextBtn").prop('disabled',false);
          $("#msgEmail").addClass('hide');
        }
      }
    }); 
  }else{

    $("#nextBtn").prop('disabled',false);
    $("#msgEmail").addClass('hide');
  }
}

function cariUsername() {
  if ($("#username").val()!=='') {

    $.ajax({
      type: "GET",
      url: "{{ url('api/get-username/') }}/"+$("#username").val(),
      success: function (data) {
        if (data=='ada') {
          $("#nextBtn").prop('disabled',true);
          $("#msgUsername").removeClass('hide');
        }else{
          $("#nextBtn").prop('disabled',false);
          $("#msgUsername").addClass('hide');
        }
      }
    }); 
  }else{
    $("#nextBtn").prop('disabled',false);
    $("#msgUsername").addClass('hide');
  }
}
</script>
</body>
</html>
