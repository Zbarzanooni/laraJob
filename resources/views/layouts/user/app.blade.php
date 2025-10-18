<!doctype html>
<html lang="en">
@include('layouts.user.header')
<body>
@include('layouts.user.navbar')
              <div class="row">
                  <div class="container">
                      <!-- Modal پیام -->
                      <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content border-0 shadow-lg rounded-3">
                                  <div class="modal-header" style="background:#f5f5f5;">
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                      <p id="alertMessage" class="mb-0"></p>
                                  </div>
                              </div>
                          </div>
                      </div>
               @yield('content')
           </div>

          </div>

   @include('layouts.user.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
            showModal("{{ session('success') }}", "success");
            @elseif(session('error'))
            showModal("{{ session('error') }}", "error");
            @endif
        });

        function showModal(message, type) {
            const messageElement = document.getElementById('alertMessage');
            messageElement.innerText = message;
            if (type === 'success') {
                alertModal.style.color = 'green';
            } else if (type === 'error') {
                messageElement.style.color = 'red';
            }

            const alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
            alertModal.show();
        }
    </script>

    @yield('script')
</body>
</html>
<style>
    .nav-item a{
        color: white;
    }
    body{
        background-color:#f5f5f5 ;
    }
</style>
