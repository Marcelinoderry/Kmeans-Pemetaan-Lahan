<?php
// mengambil file kmeans buatanku
include_once "vendor/kmeans/kmeans.php";
// untuk menload class proses
$proses = new Proses;
?>

<div class="card">
    <div class="card-header">
        <h4>Data Komoditas</h4>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatabel">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Produk</th>
                        <th colspan="3">Jumlah Penjualan Berdasarkan Tahun</th>
                    </tr>
                    <tr>
                        <th><?= $tahun1 ?></th>
                        <th><?= $tahun2 ?></th>
                        <th><?= $tahun3 ?></th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datacluster as $key => $value) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= str_replace("_", " ", $value['nama_produk']) ?></td>
                            <td><?= $value['jumlahproduk1'] ?></td>
                            <td><?= $value['jumlahproduk2'] ?></td>
                            <td><?= $value['jumlahproduk3'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Inisialisasi atau Penentuan Centroid</h4>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatabel">
                <thead>
                    <tr>
                        <th>Centroid</th>
                        <th><?php echo $tahun1 ?></th>
                        <th><?php echo $tahun2 ?></th>
                        <th><?php echo $tahun3 ?></th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php
                    // fungsi untuk menentukan berapa jumlah centroid awal dan proses pengambilannya secara acak
                    $centroid = $proses->CentroidAwal($data, 3);
                    $c = 1;
                    foreach ($centroid as $key => $value) { ?>
                        <tr>
                            <td>c<?= $c++ ?></td>
                            <?php for ($i = 0; $i < count($value); $i++) { ?>
                                <td><?= $value[$i] ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$iterasi = 1;
while (true) {
    // variabel untuk menentukan masuk pada kelompok apa
    $cluster1 = 1;
    $cluster2 = 2;
    $cluster3 = 3;
    /* cara ini untuk mengubah data menjadi array atau mengambil data secara berurut pada kolom */
    // variabel array untuk jumlah kolom yang ada pada himpunan data
    $k1 = [];
    $k2 = [];
    $k3 = [];
    // variabel array untuk jumlah centroid
    $cnt1 = [];
    $cnt2 = [];
    $cnt3 = [];
    // mengambil hasil dari perhitungan persamaan ED dan mangambil hasil perhitungan
    $hasil_iterasi = $proses->RumusPersamaanED($data, $centroid);
    // untuk mengambil data dari himpunan data
    foreach ($data as $key1 => $value1) {
        $k1[] = $value1[0];
        $k2[] = $value1[1];
        $k3[] = $value1[2];
    }
    // hasil dari proses perhitungan
    foreach ($hasil_iterasi as $key2 => $value2) {
        $cnt1[] = $value2[0];
        $cnt2[] = $value2[1];
        $cnt3[] = $value2[2];
    }
    // mengubah data menjadi array hasil centroid
    $cluster = [$cnt1, $cnt2, $cnt3];
    // untuk mengambil hasil dari cluster
    $cls = [];
    // manampilkan data pada hasil iterasi
    for ($i = 0; $i < count($data); $i++) {
        // untuk proses pembagian cluster
        if ($cnt1[$i] < $cnt2[$i] && $cnt1[$i] < $cnt3[$i]) {
            $cls[] = $cluster1;
        } else if ($cnt2[$i] < $cnt1[$i] && $cnt2[$i] < $cnt3[$i]) {
            $cls[] = $cluster2;
        } else if ($cnt3[$i] < $cnt1[$i] && $cnt3[$i] < $cnt2[$i]) {
            $cls[] = $cluster3;
        }
    }
    // mengambil hasil untuk menentukan nilai terkecil atau jarak terdekat pada hasil cluster
    $hasil_minimal = $proses->NilaiTerkecil($cluster, $data);
    // untuk mengeksekusi apa bila terdapat nilai 0 pada index pertam
    if (!$k1[0] != 0) {
        $k1[0] = sprintf("%02d", 0);
    }
    if (!$k2[0] != 0) {
        $k2[0] = sprintf("%02d", 0);
    }
    if (!$k3[0] != 0) {
        $k3[0] = sprintf("%02d", 0);
    }
    /* mulai proses pencarian nilai rata - rata dari hasil pengelompokan untuk mengambil nilai yang masuk pada cluster */
    // kolom a
    $c1 = [];
    $c2 = [];
    $c3 = [];
    // kolom b
    $d1 = [];
    $d2 = [];
    $d3 = [];
    // kolom c
    $e1 = [];
    $e2 = [];
    $e3 = [];
    // untuk menentukan apa bila ada nilai yang memiliki cluster yang sama pada saat pembagian cluster
    for ($j = 0; $j < count($cls); $j++) {
        // menampilkan data menjadi 1
        for ($i = 0; $i < 1; $i++) {
            // kolom 1 pada a
            if ($k1[$i] and $cls[$j] == 1) {
                $c1[] = $k1[$j];
            } else if ($k1[$i] and $cls[$j] == 2) {
                $c2[] = $k1[$j];
            } else if ($k1[$i] and $cls[$j] == 3) {
                $c3[] = $k1[$j];
            }
            // kolom 2 pada b
            if ($k2[$i] and $cls[$j] == 1) {
                $d1[] = $k2[$j];
            } else if ($k2[$i] and $cls[$j] == 2) {
                $d2[] = $k2[$j];
            } else if ($k2[$i] and $cls[$j] == 3) {
                $d3[] = $k2[$j];
            }
            // kolom 3 pada c
            if ($k3[$i] and $cls[$j] == 1) {
                $e1[] = $k3[$j];
            } else if ($k3[$i] and $cls[$j] == 2) {
                $e2[] = $k3[$j];
            } else if ($k3[$i] and $cls[$j] == 3) {
                $e3[] = $k3[$j];
            }
        }
        // menampilkan data menjadi 1
    }
    // hasil penyamaan atara cluster dan data
    $cluster = [
        [$c1, $c2, $c3],
        [$d1, $d2, $d3],
        [$e1, $e2, $e3]
    ];
    // untuk mengambil hasil nilai rata rata
    $nilai_rata = $proses->NilaiRatarata($cluster);
    $nilrat1 = [];
    $nilrat2 = [];
    $nilrat3 = [];
    foreach ($nilai_rata as $key => $value) {
        $nilrat1[] = $value[0];
        $nilrat2[] = $value[1];
        $nilrat3[] = $value[2];
    }
    // hasil centroid baru
    $centroid_baru = [$nilrat1, $nilrat2, $nilrat3];
    // untuk mengambil hasil centroid baru
    $centroid = $proses->CentroidBaru($centroid_baru);
    $hasil_baru = [];
    $tabel_iterasi = array();
    // untuk mengambil nama penyakit
    foreach ($datacluster as $key => $value) {
        $tabel_iterasi[$key]['nama_produk'] = str_replace("_", " ", $value['nama_produk']);
    }
    // untuk mengambil data
    foreach ($data as $key => $value) {
        // untuk mengambil data berdasarkan baris
        $tabel_iterasi[$key]['data'] = $value;
    }
    // untuk mengambil hasil centroid c1, c2, c3
    foreach ($hasil_iterasi as $key => $value) {
        // untuk mengambil jarak centroid
        $tabel_iterasi[$key]['jarak_centroid'] = $value;
    }
    // untuk mengambil nilai terkecil atau jarak terdekat
    foreach ($hasil_minimal as $key => $value) {
        // untuk mengambil jarak centroid
        $tabel_iterasi[$key]['jarak_terdekat'] = $value;
    }
    // untuk mengambil cluster
    foreach ($cls as $key => $value) {
        // untuk mengambil clustering
        $tabel_iterasi[$key]['cluster'] = $value;
    }
    // untuk menghitung berapa jumlah penyakit setiap claster
    $pemb_clus = [];
    foreach ($tabel_iterasi as $key1 => $value1) {
        for ($i = 1; $i <= count($centroid); $i++) {
            if ($value1['cluster'] == $i) {
                $pemb_clus['cls' . $i][] = $value1['cluster'];
            }
        }
    }
    // untuk mengambil pembagian class pada penyakit
    $hasil_class = array();
    foreach ($tabel_iterasi as $key => $value) {
        for ($i = 1; $i <= count($centroid); $i++) {
            if ($value['data']['nama_produk'] and $value['cluster'] == $i) {
                $hasil_class[$key]["class" . $i] = $value['data']['nama_produk'];
            }
        }
    }
    // untuk menggabungkan kedua array
    array_push($hasil_baru, $tabel_iterasi);
?>
    <!-- untuk menampikan data -->
    <?php foreach ($hasil_baru as $key => $value) : ?>
        <!-- menampilkan hasil iterasi -->
        <div class="card">
            <div class="card-header">
                <h4>Iterasi Ke-<?php echo $iterasi++ ?></h4>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="datatabel">
                        <thead>
                            <tr>
                                <th rowspan="2">Obyek</th>
                                <th rowspan="2">Nama Penyakit</th>
                                <th rowspan="2" width="50"><?php echo $tahun1 ?></th>
                                <th rowspan="2" width="50"><?php echo $tahun2 ?></th>
                                <th rowspan="2" width="50"><?php echo $tahun3 ?></th>
                                <th colspan="3">Jarak Terdekat</th>
                                <th rowspan="2">Nilai Terkecil</th>
                                <th rowspan="2">Cluster</th>
                            </tr>
                            <tr>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php $no = 1 ?>
                            <?php foreach ($value as $key1 => $value1) : ?>
                                <tr>
                                    <td width="30" align="center"><?= $no++; ?></td>
                                    <td width="195"><?= str_replace("_", " ", $value1['data']['nama_produk']); ?></td>
                                    <td width="30" align="center"><?= $value1['data'][0]; ?></td>
                                    <td width="30" align="center"><?= $value1['data'][1]; ?></td>
                                    <td width="30" align="center"><?= $value1['data'][2]; ?></td>
                                    <td width="30" align="center"><?= $value1['jarak_centroid'][0]; ?></td>
                                    <td width="30" align="center"><?= $value1['jarak_centroid'][1]; ?></td>
                                    <td width="30" align="center"><?= $value1['jarak_centroid'][2]; ?></td>
                                    <td width="30" align="center"><?= $value1['jarak_terdekat']; ?></td>
                                    <td width="30" align="center"><?= $value1['cluster']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- untuk menampilkan tabel -->
    <?php endforeach; ?>

    <!-- tabel untuk mencari nilai rata -->
    <div class="card">
        <div class="card-header">
            <h4>Mencari Nilai Rata - rata</h4>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatabel">
                    <thead>
                        <tr>
                            <th>Centroid</th>
                            <th><?php echo $tahun1 ?></th>
                            <th><?php echo $tahun2 ?></th>
                            <th><?php echo $tahun3 ?></th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php $c = 1 ?>
                        <?php foreach ($centroid_baru as $key => $value) { ?>
                            <tr>
                                <td>c<?= $c++ ?></td>
                                <?php for ($i = 0; $i < count($centroid_baru); $i++) { ?>
                                    <td><?= $value[$i] ?></td>
                                <?php } ?>
                            <tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- tabel untuk mencari nilai rata -->
<?php
    // memanggil function cluster baru
    $cluster_baru = $proses->ClusterBaru($cls, $iterasi);

    if (!$cluster_baru) {
        // berhenti
        break;
    }
}
?>
<!-- tabal untuk pembagian cluster penyakit -->
<div class="card">
    <div class="card-header">
        <h4>Pembagian Cluster Penyakit</h4>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php for ($i = 1; $i <= count($centroid); $i++) { ?>
                            <th>C<?= $i ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php
                    $no = 1;
                    foreach ($hasil_class as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <?php for ($i = 1; $i <= count($centroid); $i++) { ?>
                                <?= empty($value["class" . $i]) ? "<td align='center'> - </td>" : "<td>" . str_replace("_", " ", $value["class" . $i]) . "</td>" ?>
                            <?php } ?>
                        <tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- tabal untuk pembagian cluster penyakit -->
<!-- untuk menampikan grafik dari hasil cluster -->
<div class="card">
    <div class="card-header">
        <h4>Grafik Clustering</h4>
    </div>
    <div class="card-block">
        <div id="container"></div>
    </div>
</div>
<!-- untuk menampikan grafik dari hasil cluster -->
<!-- untuk menampilkan kesimpulan -->
<div class="card">
    <div class="card-header">
        <h4>Kesimpulan</h4>
    </div>
    <div class="card-block">
        Berdasarkan dari hasil Clustering yang telah dibagi menjadi 3 Cluss yaitu :
        <ul>
            <li>- Penderita Penyakit Terbanyak</li>
            <li>- Penderita Penyakit Sedang</li>
            <li>- Penderita Penyakit Sedikit</li>
        </ul>
        Terdapat :
        <ul>
            <li>- <b><?php echo count($pemb_clus['cls1']); ?></b> Jenis Penyakit dengan jumlah Penderita Penyakit Terbanyak</li>
            <li>- <b><?php echo count($pemb_clus['cls2']); ?></b> Jenis Penyakit dengan jumlah Penderita Penyakit Sedang</li>
            <li>- <b><?php echo count($pemb_clus['cls3']); ?></b> Jenis Penyakit dengan jumlah Penderita Penyakit Sedikit</li>
        </ul>
        Yang selanjutnya <b><?php echo count($pemb_clus['cls1']); ?></b> Jenis Penyakit tersebut akan dilakukan tindakan oleh <b> <i>Dinas Kesehatan</i> </b> untuk mengatasi agar penyakit tersebut dilakukan upaya Pencegahan dan Penanggulangan.
    </div>
    <div class="card-footer">
        <form action="<?= base_url() ?>cluster/cetak_kesimpulan" method="post" target="_blank">
            <input type="hidden" name="cls1" id="cls1" value="<?= count($pemb_clus['cls1']) ?>" />
            <input type="hidden" name="cls2" id="cls2" value="<?= count($pemb_clus['cls2']) ?>" />
            <input type="hidden" name="cls3" id="cls3" value="<?= count($pemb_clus['cls3']) ?>" />
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</button>
        </form>
    </div>
</div>
<!-- untuk menampilkan kesimpulan -->

<script>
    // untuk chart
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Penderita Penyakit Terbanyak, Sedang dan Sedikit'
        },
        subtitle: {
            text: 'Source: Alan Saputra Lengkoan  2019'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Jumlah Jenis Penderita Penyakit'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> of total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
            data: [{
                    name: "Penderita Penyakit Terbanyak",
                    y: parseInt($('#cls1').val()),
                    drilldown: "Chrome"
                },
                {
                    name: "Penderita Penyakit Sedang",
                    y: parseInt($('#cls2').val()),
                    drilldown: "Firefox"
                },
                {
                    name: "Penderita Penyakit Sedikit",
                    y: parseInt($('#cls3').val()),
                    drilldown: "Internet Explorer"
                }
            ]
        }]
    });
</script>