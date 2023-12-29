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
                    <div class="row p-5">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" value="{{ $data->nama }}" id="nama_barang" placeholder="Nama Barang" />
                        </div>
                        <div class="row col-md-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Jenis</label>
                                    <select id="jenis" class="form-select">
                                        <option value="konsumsi"  {{ $data->jenis == "Konsumsi" ? "selcted" : " " }}>Konsumsi</option>
                                        <option value="pembersih" {{ $data->jenis == "Pembersih" ? "selcted" : " " }}>Pembersih</option>
                                        <option value="elektronik"{{ $data->jenis == "Elektronik" ? "selcted" : " " }}>Elektronik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Stok</label>
                            <input type="number" value="{{ $data->stok }}" class="form-control" id="stok" placeholder="Stok Barang" />
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
                    url: '{{ env('API_URL') }}/barang/' + '{{ $data->id }}',
                    type: 'PUT',
                    headers: {
                        'Authorization': '{{ env('API_TOKEN') }}',
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify(postData),
                    success: function(response) {
                        window.location.href = '{{ route('frontend.barang') }}';
                        $('#toast_id').toast('show');
                    },
                    error: function(error) {
                        window.location.href = '{{ route('frontend.index') }}';
                        $('#toast_danger').toast('show');
                        return;
                    }
                });

                $('#addmodals').modal('hide');
            });

        });
    </script>

</body>

</html>
