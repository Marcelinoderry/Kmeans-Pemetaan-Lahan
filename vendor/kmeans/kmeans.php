<?php

/*
saya akan membuat library untuk algoritma K-Means !
akan membuat sebuah class untuk proses algoritma K-Means
*/

class Proses
{

  // fungsi untuk membuat atau mengambil nilai acak centroid pada data
  public function CentroidAwal($data, $centroid)
  {

    $rand  = [];

    for ($i=0; $i < $centroid; $i++) {

      $temp = rand(0, (count($data) - 1));

      $rand[] = $temp;

      $ctr[] = [
        $data[$rand[$i]][0],
  			$data[$rand[$i]][1],
        $data[$rand[$i]][2]
      ];

    }

    // mengembalikan nilai atau hasil
    return $ctr;

  }

  // fungsi untuk meghitung rumus persamaan ed
  public function RumusPersamaanED($kolom, $cluster)
  {

    $hasil = [];

    foreach ($kolom as $key => $value) {

      foreach ($cluster as $key1 => $cnt) {

        $hasil[$key][] = sqrt(pow($value[0] - $cnt[0], 2) + pow($value[1] - $cnt[1], 2) + pow($value[2] - $cnt[2], 2));

      }

    }

    // mengambilkan nilai atau hasil
    return $hasil;

  }

  // funsi untuk mengambil nilai terkecil pada hasil pembagian cluster
  public function NilaiTerkecil(array $cluster, $data)
  {

    // untuk menambah 1
    $no    = 0;
    $nilai = [];
    $min   = [];

    for ($i = 0; $i < count($data); $i++) {

      foreach ($cluster as $key => $value) {

        // mengambil nilai secara berpasanagan pada key
        $nilai[$i][] = $value[$no];

      }

      $no++;

    }

    // untuk jarak terdekat menentukan nilai terkecil
    foreach ($nilai as $key => $value) {

      // menentukan nilai terkecil pada nilai
      $min[] = min($value);

    }

    // mengambilkan nilai atau hasil
    return $min;

  }

  // untuk mencari nilai rata pada tabel iterasi
  public function NilaiRatarata(array $cluster)
  {

    $centroid_baru = [];

    foreach ($cluster as $key => $value) {

      $centroid_baru[$key] = [
        array_sum($value[0])/count($value[0]),
        array_sum($value[1])/count($value[1]),
        array_sum($value[2])/count($value[2])
      ];


    }

    // mengambilkan nilai atau hasil
    return $centroid_baru;

  }

  // untuk mengambil hasil centroid baru
  public function CentroidBaru(array $centroid_baru)
  {

    // mengambilkan nilai atau hasil
    return $centroid_baru;

  }

  // untuk menentukan sampai cluster sama lalu berhenti
  public function ClusterBaru(array $cluster, $iterasi){

    // mengambil centroid lama
    $centroid_lama = $this->flatten_array($cluster[($iterasi-1)]);
    // mengambil centroid baru
    $centroid_baru = $this->flatten_array($cluster[$iterasi]);

    $jumlah_sama   = 0;

    for($i = 0; $i < count($centroid_lama); $i++){

      if($centroid_lama[$i] === $centroid_baru[$i]){

        $jumlah_sama++;

      }

    }

    // mengambilkan nilai atau hasil
    return $jumlah_sama === count($centroid_lama) ? false : true;

  }

  // untuk mengambil data yang akan dicocokkan
  public function flatten_array($arg) {

    // mengambilkan nilai atau hasil
    return is_array($arg) ? array_reduce($arg, function ($c, $a) { return array_merge($c, flatten_array($a)); },[]) : [$arg];

  }

}
