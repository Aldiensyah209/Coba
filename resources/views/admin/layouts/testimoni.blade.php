@extends('admin.master')
@section('title', 'Testimoni')
@section('kontent')

<!-- KONTEN -->
<div class="card w-100">
    <div class="card-body p-4">
        <!-- Header Table -->
        <div class="d-flex align-items-center justify-content-between mb-9">
            <h5 class="card-title fw-semibold mb-0">Testimoni</h5>
            <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahKontenTestimoniModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah
                Testimoni</a>
        </div>
        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table mb-4 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
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
                    @if (count($testimoni))
                    @foreach ($testimoni as $item)
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
                        </td>
                        <td class="border-bottom-0 overflow-hidden">
                            @if ($item->gambar)
                            <img class="object-fit-cover rounded" src="{{ asset('images/post/testimoni/' . $item->gambar) }}" alt="{{ $item->gambar }}" width="120" height="100">
                            @else
                            Tidak ada gambar
                            @endif
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal text-wrap" style="width: 14rem;">
                                {{ Str::limit($item->keterangan, 45) }}
                            </p>
                        </td>
                        <td class="border-bottom-0">
                            <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editKontenTestimoniModal">
                                <i class="ti ti-edit"></i>
                            </button>
                            <form action="{{ route('testimoniAdmin.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                    <i class="ti ti-trash-x"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="d-flex justify-content-end">
                {!! $testimoni->links() !!}
            </div>
        </div>
    </div>
</div>

<!-- Create Modal Konten -->
<div class="modal fade" id="tambahKontenTestimoniModal" tabindex="-1" aria-labelledby="tambahKontenTestimoniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKontenTestimoniModalLabel">Tambah Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm" action="{{ route('testimoniAdmin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="buttonModalClose" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (count($testimoni))
<!-- Edit Modal Konten -->
<div class="modal fade" id="editKontenTestimoniModal" tabindex="-1" aria-labelledby="editKontenTestimoniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKontenTestimoniModalLabel">Edit Testimoni</h5>
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