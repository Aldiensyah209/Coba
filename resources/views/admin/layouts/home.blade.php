@extends('admin.master')
@section('title', 'Home')
@section('kontent')

<!-- KONTEN -->
<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Konten Hero</h5>
      @if (!count($konten))
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahKontenHomeModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Konten</a>
      @endif
    </div>
    <!-- Data Table -->
    <div class="table-responsive">
      <table class="table mb-4 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Judul</h6>
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
          @if (count($konten))
          @foreach ($konten as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->judul }}</h6>
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal text-wrap" style="width: 14rem;">{{ Str::limit($item->deskripsi, 45) }}</p>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editKontenHomeModal">
                <i class="ti ti-edit"></i>
              </button>
              <form action="{{ route('homeContent.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
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
<div class="modal fade" id="tambahKontenHomeModal" tabindex="-1" aria-labelledby="tambahKontenHomeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKontenHomeModalLabel">Tambah Konten</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('homeContent.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
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

@if(count($konten))
<!-- Edit Modal Konten -->
<div class="modal fade" id="editKontenHomeModal" tabindex="-1" aria-labelledby="editKontenHomeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKontenHomeModalLabel">Edit Konten</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormKontenHome" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="edit_judul" name="edit_judul" required>
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
<!-- END KONTEN -->

<!-- VIDEO -->
<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Video Slider</h5>
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahVideoModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Video</a>
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
              <h6 class="fw-semibold mb-0">Tautan</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($video))
          @foreach ($video as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
            </td>
            <td class="border-bottom-0">
              <a href="{{ $item->tautan }}" target="_blank" rel="noopener" class="fw-normal mb-0">{{ 'Video ' . $item->id }}</a>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editKontenHomeVideoModal">
                <i class="ti ti-edit"></i>
              </button>
              <form action="{{ route('homeVideo.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
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

<!-- Create Modal -->
<div class="modal fade" id="tambahVideoModal" tabindex="-1" aria-labelledby="tambahVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahVideoModalLabel">Tambah Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('homeVideo.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="mb-3">
            <label for="tautan" class="form-label">Tautan</label>
            <input type="url" class="form-control" id="tautan" name="tautan" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong/invalid format')" oninput="setCustomValidity('')" required>
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

@if(count($video))
<!-- Edit Modal Video -->
<div class="modal fade" id="editKontenHomeVideoModal" tabindex="-1" aria-labelledby="editKontenHomeVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKontenHomeVideoModalLabel">Edit Konten</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormKontenHomeVideo" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_tautan" class="form-label">Tautan</label>
            <input type="url" class="form-control" id="edit_tautan" name="edit_tautan" required>
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
<!-- END VIDEO -->

<!-- GAMBAR -->
<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Gambar Slider</h5>
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahGambarModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Gambar</a>
    </div>
    <!-- Data Table -->
    <div class="table-responsive">
      <table class="table mb-4 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">id</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Gambar</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Aksi</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($gambar))
          @foreach ($gambar as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
            </td>
            <td class="border-bottom-0 overflow-hidden">
              @if ($item->gambar)
              <img class="object-fit-cover rounded" src="{{ asset('images/post/hero/' . $item->gambar) }}" alt="{{ $item->gambar }}" width="180" height="140">
              @else
              Tidak ada gambar
              @endif
            </td>
            <td class="border-bottom-0">
              <form action="{{ route('homeImage.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
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
        {!! $gambar->links() !!}
      </div>
    </div>
  </div>
</div>

<!-- Create Modal Gambar -->
<div class="modal fade" id="tambahGambarModal" tabindex="-1" aria-labelledby="tambahGambarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBajuModalLabel">Tambah Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('homeImage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body">
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
<!-- END GAMBAR -->

@endsection