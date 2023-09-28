@extends('admin.master')
@section('title', 'Social Media')
@section('kontent')

<div class="card w-100">
  <div class="card-body p-4">
    <!-- Header Table -->
    <div class="d-flex align-items-center justify-content-between mb-9">
      <h5 class="card-title fw-semibold mb-0">Social Media</h5>
      @if (count($sosmed) < 2)
      <a href="#" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahSosmedModal"><i class="ti ti-plus fw-semibold me-2"></i>Tambah Social Media</a>
      @endif
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
              <h6 class="fw-semibold mb-0">WhatsApp</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Instagram</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Facebook</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">TikTok</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Priority</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Aksi</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($sosmed))
          @foreach ($sosmed as $item)
          <tr>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->id }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->whatsapp ? $item->whatsapp : "-" }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->instagram ? $item->instagram : "-" }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->facebook ? $item->facebook : "-" }}</h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-normal mb-0">{{ $item->tiktok ? $item->tiktok : "-" }}</h6>
            </td>
            <td class="border-bottom-0">
              <div class="d-flex align-items-center gap-2">
                @if($item->isPriority)
                <span class="badge bg-success rounded-3 fw-semibold">Utama</span>
                @endif
              </div>
            </td>
            <td class="border-bottom-0">
              <button type="button" class="btn btn-warning m-1" id="buttonEdit" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editSosmedModal">
                <i class="ti ti-edit"></i>
              </button>

              <form action="{{ route('sosmed.destroy', $item->id) }}" method="POST">
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
    </div>
  </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="tambahSosmedModal" tabindex="-1" aria-labelledby="tambahSosmedModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambaSosmedModalLabel">Tambah Social Media</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="createForm" action="{{ route('sosmed.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="text" class="form-control" id="instagram" name="instagram" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control" id="facebook" name="facebook" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3">
            <label for="tiktok" class="form-label">TikTok</label>
            <input type="text" class="form-control" id="tiktok" name="tiktok" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="priority" name="priority">
            <label class="form-label" for="priority">Priority</label>
          </div>
          <div class="modal-footer">
            <button type="button" id="buttonModalClose" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@if(count($sosmed))
<!-- Edit Modal -->
<div class="modal fade" id="editSosmedModal" tabindex="-1" aria-labelledby="editSosmedModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSosmedModalLabel">Edit Social Media</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFormSosmed" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_whatsapp" class="form-label">WhatsApp</label>
            <input type="text" class="form-control" id="edit_whatsapp" name="edit_whatsapp" required>
          </div>
          <div class="mb-3">
            <label for="edit_instagram" class="form-label">Instagram</label>
            <input type="text" class="form-control" id="edit_instagram" name="edit_instagram" required>
          </div>
          <div class="mb-3">
            <label for="edit_facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control" id="edit_facebook" name="edit_facebook" required>
          </div>
          <div class="mb-3">
            <label for="edit_tiktok" class="form-label">TikTok</label>
            <input type="text" class="form-control" id="edit_tiktok" name="edit_tiktok" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="edit_priority" name="edit_priority">
            <label class="form-label fw-bold" for="edit_priority">Priority</label>
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