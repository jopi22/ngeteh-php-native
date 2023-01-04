<?php
include 'db_connect.php';
//memulai session yang disimpan pada browser
session_start();
$name = $_SESSION['name'];
$id_user = $_SESSION['id_user'];
$id_music = $_GET['id'];
//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "sudah_login") {
  // jika belum login akan melakukan pengalihan
  header("location:../index.php");
}
?>

<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>NGETEH &maltese; 2022 </title>
    <!-- CSS files -->
    <link href="../../assets/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-flags.min.css?1666304673" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-payments.min.css?1666304673" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-vendors.min.css?1666304673" rel="stylesheet" />
    <link href="../../assets/dist/css/demo.min.css?1666304673" rel="stylesheet" />

    <script src="../../assets/music/all.min.js"></script>
    <script src="../../assets/music/jquery-3.6.0.min.js"></script>
    <script src="../../assets/music/popper.min.js"></script>
    <!-- <script src="../../assets/music/bootstrap.min.js"></script> -->
    <script src="../../assets/music/script.js"></script>
    <style>
      @import url('https://rsms.me/inter/inter.css');

      :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>

    <!-- script thumbnail preview music -->
    <style type="text/css">
      #dImage {
        width: 100%;
        max-height: 15vh;
        object-fit: scale-down;
        object-position: center center;
        ;
      }
    </style>
    <script>
      function displayImg(input, displayTo) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#' + displayTo).attr('src', e.target.result);
            $(input).siblings('.custom-file-label').html(input.files[0].name)
          }

          reader.readAsDataURL(input.files[0]);
        } else {
          $('#' + displayTo).attr('src', "./images/music-logo.jpg");
          $(input).siblings('.custom-file-label').html("Choose File")
        }
      }
    </script>
  </head>

  <body class=" layout-boxed">
    <script src="../../assets/dist/js/demo-theme.min.js?1666304673"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="../../assets/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
              <div class="btn-list">
                <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                  </svg>
                  Source code
                </a>
                <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                  <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                  </svg>
                  Sponsor
                </a>
              </div>
            </div>
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                </svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <circle cx="12" cy="12" r="4" />
                  <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                </svg>
              </a>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                  </svg>
                  <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Last updates</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Change deprecated html tags to text decoration classes (#29604)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              justify-content:between ⇒ justify-content:space-between (#29734)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 3</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Update change-version.js (#29736)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              Regenerate package-lock.json (#29730)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(../../assets/static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div><?php echo $name ?></div>
                  <div class="mt-1 small text-muted">UI Designer</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Status</a>
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Feedback</a>
                <div class="dropdown-divider"></div>
                <a href="../../assets/settings.html" class="dropdown-item">Settings</a>
                <a href="../logout.php" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../to/dash.php">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                        <line x1="12" y1="12" x2="20" y2="7.5" />
                        <line x1="12" y1="12" x2="12" y2="21" />
                        <line x1="12" y1="12" x2="4" y2="7.5" />
                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Time Management
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item active" href="../to/note.php">
                          Note
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                        <line x1="12" y1="12" x2="20" y2="7.5" />
                        <line x1="12" y1="12" x2="12" y2="21" />
                        <line x1="12" y1="12" x2="4" y2="7.5" />
                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Data Management
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item active" href="../to/music.php">
                          Music
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Extra
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="../../assets/activity.html">
                          Activity
                        </a>
                        <a class="dropdown-item" href="../../assets/gallery.html">
                          Gallery
                        </a>
                        <a class="dropdown-item" href="../../assets/invoice.html">
                          Invoice
                        </a>
                        <a class="dropdown-item" href="../../assets/search-results.html">
                          Search results
                        </a>
                        <a class="dropdown-item" href="../../assets/pricing.html">
                          Pricing cards
                        </a>
                        <a class="dropdown-item" href="../../assets/pricing-table.html">
                          Pricing table
                        </a>
                        <a class="dropdown-item" href="../../assets/faq.html">
                          FAQ
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                        <a class="dropdown-item" href="../../assets/users.html">
                          Users
                        </a>
                        <a class="dropdown-item" href="../../assets/license.html">
                          License
                        </a>
                      </div>
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="../../assets/logs.html">
                          Logs
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                        <a class="dropdown-item" href="../../assets/music.html">
                          Music
                        </a>
                        <a class="dropdown-item" href="../../assets/tasks.html">
                          Tasks
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                        <a class="dropdown-item" href="../../assets/uptime.html">
                          Uptime monitor
                        </a>
                        <a class="dropdown-item" href="../../assets/widgets.html">
                          Widgets
                        </a>
                        <a class="dropdown-item" href="../../assets/wizard.html">
                          Wizard
                        </a>
                        <a class="dropdown-item" href="../../assets/settings.html">
                          Settings
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                        <a class="dropdown-item" href="../../assets/job-listing.html">
                          Job listing
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="4" width="6" height="5" rx="2" />
                        <rect x="4" y="13" width="6" height="7" rx="2" />
                        <rect x="14" y="4" width="6" height="7" rx="2" />
                        <rect x="14" y="15" width="6" height="5" rx="2" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Layout
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="../../assets/layout-horizontal.html">
                          Horizontal
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-boxed.html">
                          Boxed
                          <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-vertical.html">
                          Vertical
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-vertical-transparent.html">
                          Vertical transparent
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-vertical-right.html">
                          Right vertical
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-condensed.html">
                          Condensed
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-combo.html">
                          Combined
                        </a>
                      </div>
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="../../assets/layout-navbar-dark.html">
                          Navbar dark
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-navbar-sticky.html">
                          Navbar sticky
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-navbar-overlap.html">
                          Navbar overlap
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-rtl.html">
                          RTL mode
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-fluid.html">
                          Fluid
                        </a>
                        <a class="dropdown-item" href="../../assets/layout-fluid-vertical.html">
                          Fluid vertical
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../assets/icons.html">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                        <line x1="10" y1="10" x2="10.01" y2="10" />
                        <line x1="14" y1="10" x2="14.01" y2="10" />
                        <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      2853 icons
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="15" y1="15" x2="18.35" y2="18.35" />
                        <line x1="9" y1="15" x2="5.65" y2="18.35" />
                        <line x1="5.65" y1="5.65" x2="9" y2="9" />
                        <line x1="18.35" y1="5.65" x2="15" y2="9" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Help
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="../../assets/docs/index.html">
                      Documentation
                    </a>
                    <a class="dropdown-item" href="../../assets/changelog.html">
                      Changelog
                    </a>
                    <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
                      Source code
                    </a>
                    <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                      Sponsor project!
                    </a>
                  </div>
                </li>
              </ul>
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                <form action="../../assets/" method="get" autocomplete="off" novalidate>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                      </svg>
                    </span>
                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-wrapper">

        <div class="page-body">
          <div class="container-xl">

            

            
            <div class="row">





              <div class="col-lg-6">
                <button class="btn btn-primary rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#music_modal" type="button"><i class="fa fa-plus"></i> Add</button>
                <div class="card">
                  <div class="list-group" id="music-list">
                    <?php        
                    $id_music = $_GET['id'];  
                    $music =mysqli_query($conn, "SELECT * FROM music_list WHERE description = '$id_music' ORDER BY title DESC");          
                    // $music = $conn->query('SELECT * FROM music_list WHERE description = '$id_music' order by title DESC');
                    while ($row = $music->fetch_assoc()) :
                      ?>                      
                      <div class="list-group-item list-group-item-action item" data-id="<?= $row['id'] ?>">
                        <div class="row g-2 align-items-center">
                          <div class="col-auto pe-2">
                            <img src="<?= is_file(explode("?", $row['image_path'])[0]) ? $row['image_path'] : "./images/music-logo.jpg" ?>" alt="" width="50px" class="img-thumbnail bg-gradient bg-dark mini-display-img">
                          </div>
                          <div class="col flex-grow-1 flex-shrink-1">
                            <p class="m-0 text-truncate" title="<?= $row['title'] ?>"><?= $row['title'] ?></p>
                          </div>
                          <div class="col-auto px-2">
                            <button class="btn btn-outline-secondary btn-sm rounded-circle play" data-id="<?= $row['id'] ?>" data-type="pause"><i class="fa fa-play"></i>play</button>
                            <button class="btn btn-outline-primary btn-sm rounded-circle edit" data-id="<?= $row['id'] ?>"><i class="fa fa-edit"></i>edit</button>
                            <button class="btn btn-outline-danger btn-sm rounded-circle delete" data-id="<?= $row['id'] ?>"><i class="fa fa-trash"></i>delete</button>
                          </div>
                        </div>
                      </div>
                    <?php endwhile; ?>

                  </div>
                </div>
              </div>

              <!-- player -->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="col-md-12 text-center">
                  <img src="./images/music-logo.jpg" alt="" id="display-img" width="200px" class="img-fluid border bg-gradient bg-dark"><br>
                  <h4><b  id="inplay-title">anjing</b></h4>
                </div> 
                <!-- <p id="inplay-description">---</p> -->
                <hr>
                <div class="d-flex w-100 justify-content-center"> 
                  <div class="mx-1">
                    <span class="text-muted" id="inplay-duration">--:--</span>
                  </div>  
                  <div class="mx-1">
                    <span id="currentTime">--:--</span>
                  </div>  
                  <div id="range-holder" class="mx-1">
                    <input type="range" id="playBackSlider" value="0">
                  </div>  
                  <div class="mx-1">
                    <span id="vol-icon"><i class="fa fa-volume-up"></i></span> <input type="range" value="100" id="volume">
                  </div>         
                  <div class="mx-1">
                    <button class="btn btn-sm btn-light bg-gradient text-dark" id="prev-btn"><i class="fa fa-step-backward"></i></button>
                  </div>
                  <div class="mx-1">
                    <button class="btn btn-sm btn-light bg-gradient text-dark" id="play-btn" data-value="play"><i class="fa fa-play"></i></button>
                  </div>
                  <div class="mx-1">
                    <button class="btn btn-sm btn-light bg-gradient text-dark" id="stop-btn"><i class="fa fa-stop"></i></button>
                  </div>
                  <div class="mx-1">
                    <button class="btn btn-sm btn-light bg-gradient text-dark" id="next-btn"><i class="fa fa-step-forward"></i></button>
                  </div>                
                </div>
                <hr>
              </div>

            </div>
          </div>
        </div>

        <!-- modal create -->
        <div class="modal text-dark" id="music_modal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-music"></i> Add New Music</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <form action="" id="music-form">
                    <input type="hidden" name="id">
                    <div class="form-group mb-3">
                      <label for="title" class="control-label">Title</label>
                      <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" required placeholder="XYZ Music">
                    </div>
                    <div class="form-group mb-3">
                      <label for="description" class="control-label">Description</label>
                      <input type="hidden" name="description" id="description" value="<?php echo $id_music ?>">
                    </div>
                    <div class="form-group mb-3">
                      <label for="audio" class="control-label">Audio File</label>
                      <input type="file" name="audio" id="audio" class="form-control form-control-sm rounded-0" required accept="audio/*" onchange="displayFileText(this)">
                    </div>
                    <div class="form-group mb-3">
                      <label for="img" class="control-label">Display Image</label>
                      <input type="file" name="img" id="img" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage')">
                    </div>
                    <div class="form-group mb-3 text-center">
                      <div class="col-md-6">
                        <img src="./images/music-logo.jpg" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm rounded-0" form="music-form">Save</button>
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal update -->
        <div class="modal text-dark" id="update_music_modal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-music"></i> Update Music Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <form action="" id="update-music-form">
                    <input type="hidden" name="id">
                    <div class="form-group mb-3">
                      <label for="title2" class="control-label">Title</label>
                      <input type="text" name="title" id="title2" class="form-control form-control-sm rounded-0" required placeholder="XYZ Music">
                    </div>
                    <div class="form-group mb-3">
                      <label for="description2" class="control-label">Description</label>
                      <textarea rows="3" name="description" id="description2" class="form-control form-control-sm rounded-0" required placeholder="Write the description here"></textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label for="audio2" class="control-label">Audio File</label>
                      <input type="file" name="audio" id="audio2" class="form-control form-control-sm rounded-0" accept="audio/*" onchange="displayFileText(this)">
                      <small><i><span class="text-muted">Current:</span> <span id="audio-current"></span></i></small>
                    </div>
                    <div class="form-group mb-3">
                      <label for="img2" class="control-label">Display Image</label>
                      <input type="file" name="img" id="img2" class="form-control form-control-sm rounded-0" accept="image/*" onchange="displayImg(this,'dImage2')">
                    </div>
                    <div class="form-group mb-3 text-center">
                      <div class="col-md-6">
                        <img src="./images/music-logo.jpg" alt="Image" class="img-fluid img-thumbnail bg-gradient bg-dark" id="dImage2">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm rounded-0" form="update-music-form">Save</button>
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>



        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="../../assets/docs/index.html" class="link-secondary">Documentation</a></li>
                  <li class="list-inline-item"><a href="../../assets/license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2022
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="../../assets/changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta14
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="../../assets/dist/libs/tinymce/tinymce.min.js?1666304673" defer></script>
    <script src="../../assets/dist/js/tabler.min.js?1666304673" defer></script>
    <script src="../../assets/dist/js/demo.min.js?1666304673" defer></script>
    <script src="../../assets/table/vendor.bundle.base.js"></script>
    <script src="../../assets/table/vendor.bundle.addons.js"></script>
    <script src="../../assets/table/data-table.js"></script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      let options = {
        selector: '#tinymce-mytextarea',
        height: 300,
        menubar: false,
        statusbar: false,
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
      }
      if (localStorage.getItem("tablerTheme") === 'dark') {
        options.skin = 'oxide-dark';
        options.content_css = 'dark';
      }
      tinyMCE.init(options);
    })
    // @formatter:on
  </script>
</body>

</html>