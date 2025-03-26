<x-header>setting</x-header>

<x-sidebar></x-sidebar>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings/</span> Informasi Rumah Makan</h4>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Informasi Terkait Rumah Makan</h5>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        @endif

                        <form action="{{ url('/setting-info') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_rumah_makan"
                                        value="{{ $informasi->nama_rumah_makan ?? '' }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" name="contact"
                                        value="{{ $informasi->contact ?? '' }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $informasi->email ?? '' }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Buka-Tutup</label>
                                <div class="col-sm-5">
                                    <input type="time" name="jam_buka" class="form-control"
                                        value="{{ $informasi->jam_buka ?? '' }}" required />
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" name="jam_tutup" class="form-control"
                                        value="{{ $informasi->jam_tutup ?? '' }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" class="form-control" required>{{ $informasi->alamat ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>
