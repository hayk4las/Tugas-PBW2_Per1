<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon Belanja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Program Menghitung Total Belanja dengan Diskon</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Apakah Anda Member?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isMember0023" value="1" id="memberYes">
                            <label class="form-check-label" for="memberYes">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isMember0023" value="0" id="memberNo" checked>
                            <label class="form-check-label" for="memberNo">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="totalPembelian" class="form-label">Total Pembelian (Rp):</label>
                        <input type="number" class="form-control" name="totalPembelian" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Total</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Fungsi menghitung total setelah diskon
            function hitungTotal($isMember0023, $totalPembelian) {
                $diskon0023 = 0;

                // Jika pembeli adalah member
                if ($isMember0023) {
                    $diskon0023 = 10; // Diskon member 10%
                    if ($totalPembelian >= 500000) {
                        $diskon0023 += 10; // Tambahan 10% jika >= 500.000
                    } elseif ($totalPembelian >= 300000) {
                        $diskon0023 += 5;  // Tambahan 5% jika >= 300.000
                    }
                } else {
                    // Pembeli bukan member
                    if ($totalPembelian >= 500000) {
                        $diskon0023 = 10; // Diskon 10% untuk pembelian >= 500.000
                    }
                }

                // Menghitung total setelah diskon
                $totalSetelahDiskon = $totalPembelian - ($totalPembelian * $diskon0023 / 100);

                return [$totalSetelahDiskon, $diskon0023];
            }

            // Mengambil data dari input form
            $isMember0023 = $_POST['isMember0023'];
            $totalPembelian = $_POST['totalPembelian'];

            // Menghitung total setelah diskon
            list($totalSetelahDiskon, $diskon0023) = hitungTotal($isMember0023, $totalPembelian);

            // Menampilkan hasil dalam tabel dengan Bootstrap
            echo '<div class="row justify-content-center mt-4">';
            echo '<div class="col-md-6">';
            echo '<h2 class="text-center">Hasil Perhitungan</h2>';
            echo '<table class="table table-bordered">';
            echo '<thead class="table-light">';
            echo '<tr><th>Keterangan</th><th>Nilai</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr><td>Total Pembelian</td><td>Rp ' . number_format($totalPembelian, 0, ',', '.') . '</td></tr>';
            echo '<tr><td>Diskon</td><td>' . $diskon0023 . '%</td></tr>';
            echo '<tr><td>Total Setelah Diskon</td><td>Rp ' . number_format($totalSetelahDiskon, 0, ',', '.') . '</td></tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
