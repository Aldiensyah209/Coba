@extends('admin.master')
@section('title', 'Baju')
@section('kontent')

    <div class="card w-100">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-9">
                <h5 class="card-title fw-semibold mb-0">Daftar Baju</h5>
                <a href="{{ route('baju.create') }}" <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#tambahBajuModal"><i class="ti ti-plus me-2"></i>Tambah Baju</a>

            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Baju</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Harga</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Gambar Baju</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Deskripsi</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $baju = $baju->reverse();
                        @endphp
                        @foreach ($baju as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $item->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $item->nama_baju }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $item->harga }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    @if ($item->gambar_baju)
                                        <img src="{{ asset('storage/' . $item->gambar_baju) }}" alt="Gambar Baju"
                                            width="100">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ Str::limit($item->deskripsi, 25) }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                        data-bs-target="#editBajuModal{{ $item->id }}">
                                        <i class="ti ti-edit"></i>
                                    </button>

                                    <form action="{{ route('baju.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus baju ini?')">
                                            <i class="ti ti-trash-x"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="tambahBajuModal" tabindex="-1" aria-labelledby="tambahBajuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBajuModalLabel">Tambah Baju</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('baju.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_baju" class="form-label">Nama Baju</label>
                            <input type="text" class="form-control" id="nama_baju" name="nama_baju" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_baju" class="form-label">Gambar Baju</label>
                            <input type="file" class="form-control" id="gambar_baju" name="gambar_baju">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editBajuModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="editBajuModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBajuModalLabel">Edit Baju</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('baju.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_nama_baju" class="form-label">Nama Baju</label>
                            <input type="text" class="form-control" id="edit_nama_baju" name="edit_nama_baju"
                                value="{{ $item->nama_baju }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="edit_harga" name="edit_harga"
                                value="{{ $item->harga }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_gambar_baju" class="form-label">Gambar Baju</label>
                            <input type="file" class="form-control" id="edit_gambar_baju" name="edit_gambar_baju">
                        </div>
                        <div class="mb-3">
                            <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="4" required>{{ $item->deskripsi }}</textarea>
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


@endsection
