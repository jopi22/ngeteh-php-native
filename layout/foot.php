  <footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
      <div class="row text-center align-items-center flex-row-reverse">
        <div class="col-lg-auto ms-lg-auto">
          <ul class="list-inline list-inline-dots mb-0">
            <li class="list-inline-item"><a href="../assets/docs/index.html" class="link-secondary">Documentation</a></li>
            <li class="list-inline-item"><a href="../assets/license.html" class="link-secondary">License</a></li>
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
              <a href="." class="link-secondary">Ponsianus Jopi</a>.
              All rights reserved.
            </li>
            <li class="list-inline-item">
              <a href="../assets/changelog.html" class="link-secondary" rel="noopener">
                v1.0.0-beta
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
  <script src="../assets/dist/libs/tinymce/tinymce.min.js?1666304673" defer></script>
  <script src="../assets/dist/js/tabler.min.js?1666304673" defer></script>
  <script src="../assets/dist/js/demo.min.js?1666304673" defer></script>
  <script src="../assets/table/vendor.bundle.base.js"></script>
  <script src="../assets/table/vendor.bundle.addons.js"></script>
  <script src="../assets/table/data-table.js"></script>
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