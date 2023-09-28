@extends('admin.master')
@section('title', 'Aneka Slempang')
@section('kontent')

<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Produk Aneka Slempang</h5>
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahBajuModalAS"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Produk</a>
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
              <h6 class="fw-normal mb-0">{{ $item->nama_as }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ "Rp " . number_format($item->harga_as,2,',','.') }}</h6>
            </td>
            <td class="border-bottom-0">
              @if ($item->gambar_as)
              <img src="{{ asset('images/post/product/aneka_slempang/' . $item->gambar_as) }}" alt="{{ $item->gambar_as }}" width="100">
              @else
              Tidak ada gambar
              @endif
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal text-wrap" style="width: 14rem;">{{ Str::limit($item->deskripsi_as, 45) }}</p>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editBajuModalAS">
                <i class="ti ti-edit"></i>
              </button>
              <form action="{{ route('as.destroy', $item->id) }}" method="POST">
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
<div class="modal fade" id="tambahBajuModalAS" tabindex="-1" aria-labelledby="tambahBajuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBajuModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('as.store') }}" method="POST" enctype="multipart/form-data">
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
<div class="modal fade" id="editBajuModalAS" tabindex="-1" aria-labelledby="editBajuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBajuModalLabel">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormAS" method="POST" enctype="multipart/form-data">
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