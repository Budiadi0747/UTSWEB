<?php
include('db.php');

// Tambah Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO produk_panen (nama, jenis, harga, stok) VALUES ('$nama', '$jenis', '$harga', '$stok')";
    if (mysqli_query($conn, $query)) {
        echo 'Data berhasil ditambahkan';
    } else {
        echo 'Gagal menambahkan data: ' . mysqli_error($conn);
    }
    exit;
}

// Fetch Data untuk DataTables
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['fetch'])) {
    $query = "SELECT * FROM produk_panen";
    $result = mysqli_query($conn, $query);

    $data = [];
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            "id" => $row['id'], // Tambahkan ID produk
            "no" => $no,
            "nama" => $row['nama'],
            "jenis" => $row['jenis'],
            "harga" => 'Rp' . number_format($row['harga'], 0, ',', '.') . '/kg',
            "stok" => $row['stok'],
            "aksi" => '<button class="btn btn-sm btn-warning edit-btn" data-id="' . $row['id'] . '">Edit</button> 
                       <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>'
        ];
        $no++;
    }

    echo json_encode(['data' => $data]);
    exit;
}
// Hapus Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $query = "DELETE FROM produk_panen WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Data berhasil dihapus';
    } else {
        echo 'Gagal menghapus data: ' . mysqli_error($conn);
    }
    exit;
}

// Fetch satu produk untuk edit
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['fetchOne'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk_panen WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }
    exit;
}

// Update Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE produk_panen SET nama='$nama', jenis='$jenis', harga='$harga', stok='$stok' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Data berhasil diperbarui';
    } else {
        echo 'Gagal memperbarui data: ' . mysqli_error($conn);
    }
    exit;
}

?>

<?php include('header.php'); ?>

<main class="main">
<section id="contact" class="contact section mt-5 mb-5">
  <div class="container section-title">
    <h2>Daftar Panen</h2>
  </div>
  <div class="container">
    <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#dataModal">Tambah Data</button>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="dataModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Panen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form id="addForm">
            <div class="modal-body">
              <input type="hidden" name="action" value="add">
              <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Jenis Produk</label>
                <select name="jenis" class="form-select" required>
                  <option>Tanaman Pokok</option>
                  <option>Sayuran</option>
                  <option>Buah-Buahan</option>
                </select>
              </div>
              <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabel Data Panen -->
    <table id="dataTable" class="table table-striped table-bordered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Jenis Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>

  <!-- Modal Edit Data -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Panen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editForm">
        <div class="modal-body">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" id="editId" name="id">
          <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" id="editNama" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Jenis Produk</label>
            <select id="editJenis" name="jenis" class="form-select" required>
              <option>Tanaman Pokok</option>
              <option>Sayuran</option>
              <option>Buah-Buahan</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Harga</label>
            <input type="number" id="editHarga" name="harga" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Stok</label>
            <input type="number" id="editStok" name="stok" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</section>
</main>

<?php include('footer.php'); ?>

<script>

$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": "data.php?fetch",
            "type": "GET"
        },
        "columns": [
            { "data": "no" },
            { "data": "nama" },
            { "data": "jenis" },
            { "data": "harga" },
            { "data": "stok" },
            { "data": "aksi" }
        ]
    });

    // Delete Data
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                type: "POST",
                url: "data.php",
                data: { action: 'delete', id: id },
                success: function(response) {
                    alert(response);
                    table.ajax.reload(null, false);
                }
            });
        }
    });

    // Edit Data
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        // Fetch data produk untuk diisi dalam form edit
        $.ajax({
            type: "GET",
            url: "data.php",
            data: { id: id, fetchOne: true },
            success: function(response) {
                var data = JSON.parse(response);
                if (data) {
                    $('#editId').val(data.id);
                    $('#editNama').val(data.nama);
                    $('#editJenis').val(data.jenis);
                    $('#editHarga').val(data.harga);
                    $('#editStok').val(data.stok);
                    $('#editModal').modal('show');
                } else {
                    alert("Data tidak ditemukan");
                }
            }
        });
    });

    // Handle form submit Edit
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "data.php",
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#editModal').modal('hide');
                table.ajax.reload(null, false);
            }
        });
    });
});

// Handle form submit Add
$('#addForm').on('submit', function(e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "data.php",
        data: $(this).serialize(),
        success: function(response) {
            alert(response);
            $('#dataModal').modal('hide');
            $('#addForm')[0].reset(); // Reset form input setelah berhasil submit
            table.ajax.reload(null, false); 
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert('Terjadi kesalahan saat menambahkan data.');
        }
    });
});


</script>


