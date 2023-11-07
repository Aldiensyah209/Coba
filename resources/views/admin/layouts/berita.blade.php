@extends('admin.master')
@section('title', 'Berita')
@section('kontent')

<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Berita</h5>
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahBeritaModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Berita</a>
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
              <h6 class="fw-semibold mb-0">Judul</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Gambar</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Tautan</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Aksi</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($berita))
          @foreach ($berita as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->judul }}</h6>
            </td>
            <td class="border-bottom-0 overflow-hidden">
              @if ($item->gambar)
              <img class="object-fit-cover rounded" src="{{ asset('images/post/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" width="120" height="100">
              @else
              Tidak ada gambar
              @endif
            </td>
            <td class="border-bottom-0">
              <a href="{{ $item->tautan }}" target="_blank" rel="noopener" class="fw-normal mb-0">Cek Tautan</a>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editBeritaModal">
                <i class="ti ti-edit"></i>
              </button>
              <form action="{{ route('berita.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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
        {!! $berita->links() !!}
      </div>
    </div>
  </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="tambahBeritaModal" tabindex="-1" aria-labelledby="tambahBeritaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBajuModalLabel">Tambah Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="tautan" class="form-label">Tautan</label>
            <input type="url" class="form-control" id="tautan" name="tautan" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong/invalid format')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
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

@if(count($berita))
<!-- Edit Modal -->
<div class="modal fade" id="editBeritaModal" tabindex="-1" aria-labelledby="editBeritaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBeritaModalLabel">Edit Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormBerita" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="edit_judul" name="edit_judul" required>
          </div>
          <div class="mb-3">
            <label for="edit_tautan" class="form-label">Tautan</label>
            <input type="url" class="form-control" id="edit_tautan" name="edit_tautan" required>
          </div>
          <div class="mb-3">
            <label for="edit_gambar_baju" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="edit_gambar" name="edit_gambar">
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