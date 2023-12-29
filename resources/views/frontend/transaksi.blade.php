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
                        <div class="row justify-content-end">
                            <div class="col-md-2">
                                <a href="{{ route('addtransaksi.edit') }}" class="btn btn-primary">
                                    <i class="ti ti-table-plus"></i> </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter" id="TransactionTable">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Transaksi Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <h1 class="text-left display-8 font-weight-bolder mt-5">
                            Transaksi Analisis</h1>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date"
                                        placeholder="Input placeholder" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="end_date"
                                        placeholder="Input placeholder" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2">
                                    <button id="get_data_date" class="btn btn-primary">
                                        Kirim<span class=""></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter" id="analisis">
                                <thead>
                                    <tr>
                                        <th>Jenis Barang Terbesar</th>
                                        <th id="jenis_terbesar">{{ $responseData['jenis_terbesar'] }}</th>
                                        <th>Jumlah Terjual Terbesar</th>
                                        <th id="jumlah_terbesar">{{ $responseData['jumlah_terbesar'] }}</th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Barang Terkecil</th>
                                        <th id="jenis_terkecil">{{ $responseData['jenis_terkecil'] }}</th>
                                        <th>Jumlah Terjual Terkecil</th>
                                        <th id="jumlah_terkecil">{{ $responseData['jumlah_terkecil'] }}</th>
                                    </tr>
                                </thead>
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




    <!-- Tabler JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            loadAnalisisTrx();
            loadDataTrx();

            $('#get_data_date').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                if (startDate == '' || endDate == '') {
                    alert('Tanggal tidak boleh kosong');
                }
                loadAnalisisTrx();
            });

            function loadAnalisisTrx() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                $.ajax({
                    url: '{{ env('API_URL') }}/transaksi/analisis',
                    type: 'GET',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}'
                    },
                    data: {
                        start_date: startDate ?? '',
                        end_date: endDate ?? ''
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#jenis_terbesar').text(response.data.jenis_terbesar);
                            $('#jumlah_terbesar').text(response.data.jumlah_terbesar);
                            $('#jenis_terkecil').text(response.data.jenis_terkecil);
                            $('#jumlah_terkecil').text(response.data.jumlah_terkecil);
                        } else {
                            console.log(response.message);
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }

            function loadDataTrx() {
                $.ajax({
                    url: '{{ env('API_URL') }}/transaksi',
                    type: 'GET',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}'
                    },
                    success: function(response) {
                        if (response.data.length > 0) {
                            $('#TransactionTable tbody').empty();
                            $.each(response.data, function(index, trx) {
                                var trxdata = trx.barang ? trx.barang.nama : 'N/A';
                                var newRow = $('<tr>').append(
                                    $('<td>').text(trxdata),
                                    $('<td>').text(trx.jumlah),
                                    $('<td>').text(trx.tanggal),
                                    $('<td>').text(trx.transaksi_type),
                                    $('<td>').html(
                                        '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-trx-id="' +
                                        trx.id + '">' +
                                        '<i class="ti ti-trash"></i></button>'
                                    )
                                );

                                $('#TransactionTable tbody').append(newRow);
                            });
                        }
                    },
                    error: function(error) {
                        $('#TransactionTable tbody').empty();
                        $('#TransactionTable tbody').append(
                            '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>'
                        );
                    }
                });
            }


            function deleteTrx(trxid) {
                $.ajax({
                    url: '{{ env('API_URL') }}/transaksi/' + trxid,
                    type: 'DELETE',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}'
                    },
                    success: function(response) {
                        loadDataTrx();
                        loadAnalisisTrx();

                        $('#toast_id').toast('show');
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }

            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var trxid = button.data('trx-id');
                console.log(trxid);
                $('#confirm_delete').data('trx-id',
                    trxid);
            });

            $('#confirm_delete').on('click', function() {
                var trxid = $(this).data('trx-id');
                deleteTrx(trxid);
            });
        });
    </script>
</body>

</html>
