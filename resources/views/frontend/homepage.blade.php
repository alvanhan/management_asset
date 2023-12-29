<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script> <!-- Custom CSS -->
    <style>
    </style>
</head>

<body>
    <div class="continer m-5">
        <div class="card">
            <div class="card-body p-5">
                <h1 class="text-center display-5 font-weight-bolder mb-5"><i class="ti ti-box text-blue"></i>Simple Management Asset</h1>
                <div class="div">
                    <div class="row justify-center justify-content-center">
                        <div class="col-md-3">
                            <a href="{{ route('frontend.barang') }}" class="link-underline link-underline-opacity-0">
                                <div class="card bg-blue">
                                    <div class="card-body text-center">
                                        <h3 class="card-title font-weight-bolder text-white">Barang Management</h3>
                                        <p class="mb-2"><i class="ti ti-brand-databricks display-1 text-white"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('frontend.transaksi') }}">
                                <div class="card bg-yellow">
                                    <div class="card-body text-center">
                                        <h3 class="card-title  text-white">Transaksi Management</h3>
                                        <p class="mb-2"><i class="ti ti-microwave display-1 text-white"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Tabler JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <!-- Custom JS -->
    <script></script>
</body>

</html>
