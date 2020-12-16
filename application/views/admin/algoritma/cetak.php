<title>Laporan Hasil Metode</title>

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
                    <img src="<?= assets_url() ?>logo.png" alt="Logo Kabupaten Mamasa" style="width: 70p; height: 70px;">
                </td>
                <td width="600" align="center">
                    <h3>Pemerintah Kabupaten Mamasa</h3>
                    <em>Jl. Pendidikan Kec. Mamasa Kab. Mamasa<br />Kode Pos: 91362</em>
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <h3 style="text-align: center;">Laporan Data Perkebunan Hasil Clustering</h3>

    <br />

    <table align="center">
        <tr>
            <td width="700">
                Berdasarkan dari hasil Clustering yang telah dibagi menjadi 3 Cluss yaitu :
                <ul>
                    <li>Panen Perkebunan Terbanyak</li>
                    <li>Panen Perkebunan Sedang</li>
                    <li>Panen Perkebunan Sedikit</li>
                </ul>
                Terdapat :
                <ul>
                    <li><b><?= $hasil_cluster[0] ?></b> Jenis Penyakit dengan jumlah Panen Perkebunan Terbanyak</li>
                    <li><b><?= $hasil_cluster[1] ?></b> Jenis Penyakit dengan jumlah Panen Perkebunan Sedang</li>
                    <li><b><?= $hasil_cluster[2] ?></b> Jenis Penyakit dengan jumlah Panen Perkebunan Sedikit</li>
                </ul>
            </td>
        </tr>
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
                <p class="nama">Kepala Dinas Kabupaten Mamasa</p>
            </td>
        </tr>
    </table>

</div>

<button type="button" onclick="cetakContent('cetak-kesimpulan');">Cetak</button>

<!-- untuk cetak kesimpulan -->
<script>
    function cetakContent(bagian) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(bagian).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>