<div id="cetak-kesimpulan">
    <!-- CSS -->
    <style media="screen">
        .judul {
            padding: 4mm;
            text-align: center;
        }

        .nama {
            text-decoration: underline;
            font-weight: bold;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        h3 {
            font-family: times;
        }

        p {
            font-family: times;
            margin: 0;
        }
    </style>
    <!-- CSS -->

    <div class="judul">
        <table align="center">
            <tr>
                <td>
                    <img src="<?= assets_url() ?>logo.png" alt="Logo Rumah Sakit" style="width: 70px; height: 80px;">
                </td>
                <td width="600" align="center">
                    <h3>DATA STATISTIK PERKEBUNAN</h3>
                    <h3>TAHUN <?= $tahun ?></h3>
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <table align="center">
        <tr>
            <td width="700">
                Berdasarkan dari hasil perkebunan pada tahun <?= $tahun ?> <?= $kecamatan ?> :
            </td>
        </tr>
    </table>

    <br /><br />

    <table border="1" align="center">
        <thead>
            <tr>
                <th>No.</th>
                <th>Komoditi</th>
                <th>Produksi (TON)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $key => $value) :
            ?>
                <tr>
                    <td align="center"><?= $no++ ?>.</td>
                    <td><?= $value->perkebunan ?></td>
                    <td><?= number_format($value->produksi, 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br /><br />

    <table align="center">
        <tr>
            <td width="460"></td>
            <td align="center">
                <p>Yang bertanda tangan dibawah ini :</p>
                <br />
                <br />
                <br />
                <br />
                <p class="nama">Dinas Pertanian, Perkebunan dan Hortikultura</p>
            </td>
        </tr>
    </table>
</div>