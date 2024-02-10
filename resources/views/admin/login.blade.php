<!doctype html>
<html lang="az">
  <head>
    <meta charset="utf-8" />
    <title>Sünnəyə Dəvət | Flat Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="account-pages my-5 pt-sm-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
              <div class="bg-primary bg-soft">
                <div class="row">
                  <div class="col-7">
                    <div class="text-primary p-4">
                      <h5 class="text-primary">FlatPanel v5.9</h5>
                      <p>Məlumatların 3-cü şəxslərə ötürülməsi cinayət işinə cəlb edir!</p>
                    </div>
                  </div>
                  <div class="col-5 align-self-end">
                    <img src="{{ asset('admin/assets/images/profile-img.png') }}" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="auth-logo">
                  <a href="{{ route('admin.login.get') }}" class="auth-logo-light">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                      <img src="{{ asset('admin/assets/images/logo-light.svg') }}" class="rounded-circle" height="34">
                      </span>
                    </div>
                  </a>
                  <a href="{{ route('admin.login.get') }}" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                      <span class="avatar-title rounded-circle bg-light">
                      <img src="{{ asset('admin/assets/images/logo.svg') }}" class="rounded-circle" height="34">
                      </span>
                    </div>
                  </a>
                </div>
                <div class="p-2">
                  @if ($message = Session::get('error'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-outline me-2"></i>
                    {!! Session::get('error') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  @if ($errors->any())
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-outline me-2"></i>
                    @foreach ($errors->all() as $error)
                    {!! $error !!}.
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <form class="form-horizontal" action="{{ route('admin.login.post') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Emaili daxil edin">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Şifrə</label>
                      <div class="input-group auth-pass-inputgroup">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Şifrənizi daxil edin" aria-label="Password" aria-describedby="password-addon">
                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                      </div>
                    </div>
                    <div class="mt-3 d-grid">
                      <button class="btn btn-primary waves-effect waves-light" type="submit">Daxil ol</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="mt-5 text-center">
              <div>
                <p>
                  © <script>document.write(new Date().getFullYear())</script><a target="_blank" href="https://flatstudio.az" class="fw-medium text-primary"> Flat Studio</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end account-pages -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
  </body>
</html>