<?php

    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Website Informasi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

<style>
        th{
            font-family: sans-serif, 'Times New Roman', Times, serif;
        }
        .align-right {
            text-align: right;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            border-width: 2px;
        }
        .align-left {
            text-align: left;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            border-width: 2px;
        }
        .align-center {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-weight: normal;
            border-width: 2px;
        }
        .table-width-100{
            width: 50%;
        }
        .th-style{
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            border-width: 2px;
        }
    </style>
</head>
<body>
    <table class="table table-striped-columns">
        <tr>
            <th class="th-style">No</th>
            <th class="th-style">Tanggal</th>
            <th class="th-style" style= "text-align: left">Kategori</th>
            <th class="th-style">Keterangan</th>
            <th class="th-style">Pemasukan</th>
            <th class="th-style">Pengeluaran</th>
        </tr>
<?php 

$mbl = array(
    array( 'no'=> 1, 'tgl'=> '01-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> '', 'pms'=> 1000000, 'png'=> 0),
    array( 'no'=> 2, 'tgl'=> '01-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> 'gaada', 'pms'=> 100000, 'png'=> 0),
    array( 'no'=> 3, 'tgl'=> '08-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> '', 'pms'=> 200000, 'png'=> 0),
    array( 'no'=> 4, 'tgl'=> '09-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> 'test pemasukan 090323', 'pms'=> 89000, 'png'=> 0),
    array( 'no'=> 5, 'tgl'=> '09-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> 'test pengeluaran 090323', 'pms'=> 0, 'png'=> 21000),
    array( 'no'=> 6, 'tgl'=> '16-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> 'lunas yak', 'pms'=> 165000, 'png'=> 0),
    array( 'no'=> 7, 'tgl'=> '16-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> 'lunas yak', 'pms'=> 330000, 'png'=> 0),
    array( 'no'=> 8, 'tgl'=> '15-03-2023', 'ktg'=> 'Pinjaman ulang', 'ktr'=> 'tes', 'pms'=> 100000, 'png'=> 0),
    array( 'no'=> 9, 'tgl'=> '16-03-2023', 'ktg'=> 'Belanja modal', 'ktr'=> 'tes card tahun', 'pms'=> 100000, 'png'=> 0),
    array( 'no'=> 10, 'tgl'=> '24-03-2023', 'ktg'=> 'Pembayaran pesanan', 'ktr'=> '', 'pms'=> 24032023, 'png'=> 0),
);

function sbTotal ($barang){
    $ttlHrg = array();

    foreach ($barang as  $subAray) {
        $subTotal = $subAray['pms'];
        $ttlHrg[] = $subTotal;
    }

    return $ttlHrg;

}
$ttlHrg = sbTotal($mbl);

foreach($mbl as $index => $subAray)
{
    echo '<tr>'."<th class= 'align-left'>".$subAray['no'].'</th>'."<th class= 'align-left'>".$subAray['tgl'].'</th>'."<th class= 'align-left'>".$subAray['ktg'].'</th>'."<th class='align-right';>".$subAray['ktr'].'</th>'."<th class= 'align-center'>".'Rp. '.number_format($subAray['pms'], 0, '.','.' ).'</th>'."<th class= 'align-right'>".'Rp. '.number_format($subAray['png'], 0, '.','.' ).'</th>'.'</tr>';
}

function hitungTotalAkhir($subtotals) {
    $totalAkhir = array_sum($subtotals);
    return $totalAkhir;
}

$subtotalHarga = sbTotal($mbl);
$totalAkhir = hitungTotalAkhir($subtotalHarga);

echo '<th colspan = "4" style = "text-align: right; font-family: Times New Roman">TOTAL</th>';
echo "<th style= 'font-family: Times New Roman; text-weight: bold; text-align: right; border-width: 2px'; color:'red'>".'Rp. '.number_format($totalAkhir, 0,'.','.').'</th>';
echo "<th style= 'font-family: Times New Roman; text-weight: bold; text-align: right; border-width: 2px'; color:'red'>".'Rp. '.number_format($totalAkhir, 0,'.','.').'</th>';

echo '<tr>.<th colspan = "4" style = "text-align: right; font-family: Times New Roman">Saldo</th>';
echo "<th colspan =  '2' style= 'font-family: Times New Roman; text-weight: bold; text-align: center; border-width: 2px'; color-background:'red'>".'Rp. '.number_format($totalAkhir, 0,'.','.').'</th></tr>';
?>

<?php 

    include 'footer.php';

?>

