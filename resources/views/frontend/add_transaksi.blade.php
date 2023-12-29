<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Transaksi</title>
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
                    Transaksi</h1>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <select name="id_barang" required id="id_barang" class="form-select">
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Barang</label>
                                <input type="number" class="form-control" required id="jumlah" name="jumlah" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" required id="tanggal" name="tanggal" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transaksi Type</label>
                                <input type="text" class="form-control" id="transaksi_type" name="transaksi_type" placeholder="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 text-right">
                        <a href="{{ route('frontend.index') }}" type="button" class="btn btn-secondary">
                            <i class="ti ti-arrow-left pe-2"></i> Back
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button id="saveButton" type="button" class="btn btn-primary">Save</button>
                    </div>
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
            $('#saveButton').on('click', function() {
                var id_barang = $('#id_barang').val();
                var jumlah = $('#jumlah').val();
                var tanggal = $('#tanggal').val();
                var transaksi_type = $('#transaksi_type').val();

                if (jumlah < 1 || isNaN(jumlah)) {
                    alert('Jumlah harus lebih dari 1 atau sama dengan 1 dan harus berupa angka.');
                }

                if (!id_barang || !jumlah || !tanggal) {
                    alert('Isi semua data dengan benar!.');
                    return;
                }

                var postData = {
                    barang_id: id_barang,
                    jumlah: jumlah,
                    tanggal: tanggal,
                    transaksi_type: transaksi_type != null ? transaksi_type : null
                };

                $.ajax({
                    url: '{{ env('API_URL') }}/transaksi',
                    type: 'POST',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}',
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify(postData),
                    success: function(response) {
                        console.log(response);
                        window.location.href = '{{ route('frontend.transaksi') }}';
                    },
                    error: function(error) {
                        window.location.href = '{{ route('frontend.transaksi') }}';
                        return;
                    }
                });

                $('#addmodals').modal('hide');
            });

        });
    </script>
</body>

</html>
