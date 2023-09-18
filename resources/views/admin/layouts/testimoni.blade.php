@extends('admin.master')
@section('title', 'Testimoni')
@section('kontent')

    <!-- KONTEN -->
    <div class="card w-100">
        <div class="card-body p-4">
            <!-- Header Table -->
            <div class="d-flex align-items-center justify-content-between mb-9">
                <h5 class="card-title fw-semibold mb-0">Konten Testimoni</h5>

                <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#tambahKontenModalTestimoni"><i class="ti ti-plus fw-semibold me-2"></i>Tambah
                    Testimoni</a>

            </div>
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table mb-4 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>


                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Gambar</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Keterangan</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kontenttestimoni))
                            @foreach ($kontenttestimoni as $item)
                                <tr>

                                    <td class="border-bottom-0">
                                        @if ($item->gambar)
                                            <img src="{{ asset('images/post/landingPage/testimoni/' . $item->gambar) }}"
                                                alt="{{ $item->gambar }}" width="100">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal text-wrap" style="width: 14rem;">
                                            {{ Str::limit($item->keterangan, 45) }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <button type="button" class="btn btn-warning m-1" id="buttonEdit"
                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                            data-bs-target="#editKontenModalTestimoni">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <form action="{{ route('testimoniAdmin.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                                <i class="ti ti-trash-x"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal Konten -->
    <div class="modal fade" id="tambahKontenModalTestimoni" tabindex="-1" aria-labelledby="tambahKontenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKontenModalLabel">Tambah Konten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createForm" action="{{ route('testimoniAdmin.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')"
                                oninput="setCustomValidity('')" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4"
                                oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="buttonModalClose" class="btn btn-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal Konten -->
    @if (count($kontenttestimoni))
        <div class="modal fade" id="editKontenModalTestimoni" tabindex="-1" aria-labelledby="editKontenModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKontenModalLabel">Edit Konten</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateFormKontenTestimoni" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="edit_gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="edit_gambar" name="edit_gambar">
                            </div>
                            <div class="mb-3">
                                <label for="edit_keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="edit_keterangan" name="edit_keterangan" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection
