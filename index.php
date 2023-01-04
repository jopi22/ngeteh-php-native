<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login Dulu Bujang</title>
  <!-- CSS files -->
  <link href="assets/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
  <link href="assets/dist/css/tabler-flags.min.css?1666304673" rel="stylesheet" />
  <link href="assets/dist/css/tabler-payments.min.css?1666304673" rel="stylesheet" />
  <link href="assets/dist/css/tabler-vendors.min.css?1666304673" rel="stylesheet" />
  <link href="assets/dist/css/demo.min.css?1666304673" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
  </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
  <script src="assets/dist/js/demo-theme.min.js?1666304673"></script>
  <div class="page page-center">
    <div class="container container-normal py-4">
      <div class="row align-items-center g-4">
        <div class="col-lg">
          <div class="container-tight">
            <div class="text-center mb-4">
              <a href="." class="navbar-brand navbar-brand-autodark"><img src="assets/static/logo.svg" height="36" alt=""></a>
            </div>
            <div class="card card-md">
              <div class="card-body">
                <h2 class="h2 text-center mb-4">Masuk ke Akun</h2>
                <!-- form login -->
                <form action="logcont.php" method="post" autocomplete="off" novalidate>
                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" autocomplete="off">
                  </div>
                  <div class="mb-2">
                    <label class="form-label">
                      Password
                    </label>
                    <div class="input-group input-group-flat">
                      <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="off">
                      <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                          <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                          </svg>
                        </a>
                      </span>
                    </div>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                  </div>
                </form>
                <!-- form login xx-->
              </div>
            </div>
            <div class="text-center text-muted mt-3">
              <a href="assets/sign-up.html" tabindex="-1">Buat akun</a>
            </div>
          </div>
        </div>
        <div class="col-lg d-none d-lg-block">
          <img src="assets/static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="assets/dist/js/tabler.min.js?1666304673" defer></script>
  <script src="assets/dist/js/demo.min.js?1666304673" defer></script>
</body>

</html>