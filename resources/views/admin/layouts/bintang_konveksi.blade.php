@extends('admin.master')
@section('title', 'Bintang Konveksi')
@section('kontent')

<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Produk Bintang Konveksi</h5>
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahBajuBintangKonveksiModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Produk</a>
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
              <h6 class="fw-semibold mb-0">Nama</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Harga</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Gambar</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Deskripsi</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Aksi</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($produk))
          @foreach ($produk as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->nama_bk }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ "Rp " . number_format($item->harga_bk,2,',','.') }}</h6>
            </td>
            <td class="border-bottom-0 overflow-hidden">
              @if ($item->gambar_bk)
              <img class="object-fit-cover rounded" src="{{ asset('images/post/product/bintang_konveksi/' . $item->gambar_bk) }}" alt="{{ $item->gambar_bk }}" width="120" height="100">
              @else
              Tidak ada gambar
              @endif
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal text-wrap" style="width: 14rem;">{{ Str::limit($item->deskripsi_bk, 45) }}</p>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editBajuBintangKonveksiModal">
                <i class="ti ti-edit"></i>
              </button>
              <form action="{{ route('bk.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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
        {!! $produk->links() !!}
      </div>
    </div>
  </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="tambahBajuBintangKonveksiModal" tabindex="-1" aria-labelledby="tambahBajuBintangKonveksiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBajuBintangKonveksiModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('bk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_baju" class="form-label">Nama Baju</label>
            <input type="text" class="form-control" id="nama" name="nama" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="gambar_baju" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required></textarea>
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

@if(count($produk))
<!-- Edit Modal -->
<div class="modal fade" id="editBajuBintangKonveksiModal" tabindex="-1" aria-labelledby="editBajuBintangKonveksiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBajuBintangKonveksiModalLabel">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormBintangKonveksi" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_nama_baju" class="form-label">Nama</label>
            <input type="text" class="form-control" id="edit_nama" name="edit_nama" required>
          </div>
          <div class="mb-3">
            <label for="edit_harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="edit_harga" name="edit_harga" required>
          </div>
          <div class="mb-3">
            <label for="edit_gambar_baju" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="edit_gambar" name="edit_gambar">
          </div>
          <div class="mb-3">
            <label for="edit_deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="4" required></textarea>
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