<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <style>
    </style>
</head>

<body>
    <div class="continer m-5">
        <div class="card">
            <div class="card-body p-5">
                <h1 class="text-left display-6 font-weight-bolder mb-5"><i class="ti ti-box text-blue"></i>Management
                    Barang</h1>

                <div class="div">
                    <div class="div justify-content-end">
                        <div class="toast ms-5" id="toast_id" role="alert" aria-live="assertive" aria-atomic="true"
                            data-bs-autohide="false" data-bs-toggle="toast">
                            <div class="toast-header bg-green text-white">
                                <strong class="me-auto">Status</strong>
                                <small>baru saja</small>
                                <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Berhasil memperbaharui data.
                            </div>
                        </div>
                    </div>

                    <div class="div justify-content-end">
                        <div class="toast ms-5" id="toast_danger" role="alert" aria-live="assertive"
                            aria-atomic="true" data-bs-autohide="false" data-bs-toggle="toast">
                            <div class="toast-header bg-red text-white">
                                <strong class="me-auto">Status</strong>
                                <small>baru saja</small>
                                <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Data sudah tersedia.
                            </div>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="row justify-content-end">
                            <div class="col-md-2">
                                <button type="button" id="add_modata" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addmodals">
                                    <i class="ti ti-table-plus"></i> </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter" id="barangTable">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Stok</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <a href="{{ route('frontend.index') }}" type="button" class="btn btn-secondary">
                    <i class="ti ti-arrow-left pe-2"></i> Back
                </a>
            </div>
        </div>
    </div>


    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Ingin Menghapus data ?</h3>
                    <div class="text-secondary">Apa yang telah Anda lakukan tidak bisa di kembalikan.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><button id="confirm_delete" class="btn btn-danger w-100"
                                    data-bs-dismiss="modal">
                                    Delete data
                                </button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editmodals" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Barang" />
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Jenis</label>
                                <select name="jenis" class="form-select">
                                    <option value="konsumsi" selected>Konsumsi</option>
                                    <option value="pembersih">Pembersih</option>
                                    <option value="elektronik">Elektronik</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Stok Barang" />
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>




    <div class="modal" id="addmodals" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" />
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Jenis</label>
                                <select id="jenis" class="form-select">
                                    <option value="konsumsi" selected>Konsumsi</option>
                                    <option value="pembersih">Pembersih</option>
                                    <option value="elektronik">Elektronik</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" placeholder="Stok Barang" />
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button id="saveButton" class="btn btn-primary ms-auto">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>





    <!-- Tabler JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            loadBarangData();

            $('#add_modata').on('click', function() {
                $('#nama_barang').val('');
                $('#jenis').val('');
                $('#stok').val('');
            });

            $('#saveButton').on('click', function() {
                var namaBarang = $('#nama_barang').val();
                var jenis = $('#jenis').val();
                var stok = $('#stok').val();

                if (!namaBarang || !jenis || !stok) {
                    alert('Isi semua data dengan benar!.');
                    return;
                }

                var postData = {
                    nama_barang: namaBarang,
                    jenis: jenis,
                    stok: stok
                };

                $.ajax({
                    url: '{{ env('API_URL') }}/barang',
                    type: 'POST',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}',
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify(postData),
                    success: function(response) {
                        loadBarangData();
                        $('#toast_id').toast('show');
                    },
                    error: function(error) {
                        $('#toast_danger').toast('show');
                        return;
                    }
                });

                $('#addmodals').modal('hide');
            });

            function loadBarangData() {
                $.ajax({
                    url: '{{ env('API_URL') }}/barang',
                    type: 'GET',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}'
                    },
                    success: function(response) {
                        if (response.data.length > 0) {
                            $('#barangTable tbody').empty();
                            $.each(response.data, function(index, barang) {
                                var newRow = $('<tr>').append(
                                    $('<td>').text(barang.nama),
                                    $('<td>').text(barang.jenis),
                                    $('<td>').text(barang.stok),
                                    $('<td>').text(barang.created_at),
                                    $('<td>').html(
                                        '<a href="{{ route('barangview.edit') }}/?id=' + barang.id + '" class="btn btn-warning me-2">' +
                                        '<i class="ti ti-pencil-cog"></i></a>' +
                                        '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-barang-id="' +
                                        barang.id + '">' +
                                        '<i class="ti ti-trash"></i></button>'
                                    )
                                );

                                $('#barangTable tbody').append(newRow);
                            });
                        }
                    },
                    error: function(error) {
                        $('#barangTable tbody').empty();
                        $('#barangTable tbody').append(
                            '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>'
                        );
                    }
                });
            }

            function deleteBarang(barangId) {
                $.ajax({
                    url: '{{ env('API_URL') }}/barang/' + barangId,
                    type: 'DELETE',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}'
                    },
                    success: function(response) {
                        loadBarangData();
                        $('#toast_id').toast('show');
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var barangId = button.data('barang-id');
                console.log(barangId);
                $('#confirm_delete').data('barang-id',
                    barangId);
            });

            $('#confirm_delete').on('click', function() {
                var barangId = $(this).data('barang-id');
                deleteBarang(barangId);
            });
        });
    </script>

</body>

</html>
