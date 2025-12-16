<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriSmart Header</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #2E7D32; /* Hijau gelap */
      padding: 10px 20px;
      color: white;
    }

    .navbar-left, .navbar-right {
      display: flex;
      align-items: center;
    }

    .navbar-left .icon {
      font-size: 20px;
      margin-right: 10px;
    }

    .title {
      font-weight: bold;
      font-size: 18px;
    }

    .navbar-center a {
      margin: 0 10px;
      text-decoration: none;
      color: white;
      font-weight: 500;
    }

    .navbar-center a:hover {
      text-decoration: underline;
    }

    .navbar-right .icon {
      font-size: 20px;
    }
  </style>
</head>
<body>

  <header class="navbar">
    <div class="navbar-left">
      <span class="icon">&#8592;</span> <!-- Panah kiri -->
      <span class="title">AgriSmart</span>
    </div>
    <nav class="navbar-center">
      <a href="#">Home</a>
      <a href="#">Help Desk</a>
    </nav>
    <div class="navbar-right">
      <span class="icon">&#128276;</span> <!-- Ikon lonceng -->
    </div>
  </header>

    <title>Riwayat Tanam - AgriSmart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body { background-color: #f8f9fa; }
        .action-icons button { margin-right: 5px; }
        .footer { background-color: #343a40; color: white; padding: 20px 0; margin-top: 40px; }
        .footer a { color: #ffc107; text-decoration: none; }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Riwayat Tanam</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah Data -->
    <form method="POST" action="{{ route('riwayat.store') }}" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-2"><input type="date" name="tanggal" class="form-control" required></div>
            <div class="col-md-3"><input type="text" name="kegiatan_perawatan" class="form-control" placeholder="Kegiatan" required></div>
            <div class="col-md-4"><input type="text" name="catatan" class="form-control" placeholder="Catatan"></div>
            <div class="col-md-1">
                <label><input type="checkbox" name="status" value="1"> Selesai</label>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">Tambah Data</button>
            </div>
        </div>
    </form>

    <!-- Tabel Riwayat -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan Perawatan</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d - m - Y') }}</td>
                <td>{{ $item->kegiatan_perawatan }}</td>
                <td>{{ $item->catatan }}</td>
                <td>
                    <input type="checkbox" enable {{ $item->status ? 'checked' : '' }}>
                </td>
                <td>
                    <div class="action-icons">
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-sm btn-warning"
                            onclick="openEditModal('{{ $item->id_riwayat }}', '{{ $item->tanggal }}', '{{ $item->kegiatan_perawatan }}', '{{ $item->catatan }}', '{{ $item->status }}')">
                            <i class="fas fa-pen"></i>
                        </button>

                        <!-- Tombol Delete -->
                        <form method="POST" action="{{ route('riwayat.destroy', $item->id_riwayat) }}" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editForm">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Riwayat Tanam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="editTanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kegiatan Perawatan</label>
                    <input type="text" name="kegiatan_perawatan" id="editKegiatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Catatan</label>
                    <textarea name="catatan" id="editCatatan" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status" id="editStatus" value="1"> Selesai
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </div>
        </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fungsi untuk membuka modal edit dengan data yang dipilih
    function openEditModal(id, tanggal, kegiatan, catatan, status) {
        document.getElementById('editForm').action = '/riwayat-tanam/' + id;
        document.getElementById('editTanggal').value = tanggal;
        document.getElementById('editKegiatan').value = kegiatan;
        document.getElementById('editCatatan').value = catatan;
        document.getElementById('editStatus').checked = status == 1 ? true : false;
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }
</script>

<!-- Footer -->
<div class="footer text-center">
    <p>Kementerian Pertanian Indonesia - Banyumas, Jawa Tengah</p>
    <p>Kontak WhatsApp: Tri Julyanta | Hery Supriadi</p>
    <p>
        <a href="#">Instagram</a> |
        <a href="#">YouTube</a> |
        <a href="#">Facebook</a>
    </p>
</div>
</body>
</html>