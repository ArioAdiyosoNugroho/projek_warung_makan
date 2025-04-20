
              <!-- Toast Container -->
              @if(session('success'))
              <div class="position-fixed top-0 end-0 p-3" style="z-index: 999999;">
                <div class="bs-toast toast fade show border-primary" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Selamat</div>
                    {{-- <small>notifikasi</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    <div>{{ session('success') }}</div>
                  </div>
                </div>
              </div>
              @endif

              @if(session('error'))
              <div class="position-fixed top-0 end-0 p-3" style="z-index: 999999;">
                <div class="bs-toast toast fade show  border-danger" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Peringatan</div>
                    {{-- <small>Notifikasi</small> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    <div>{{ session('error') }}</div>
                  </div>
                </div>
              </div>
              @endif
