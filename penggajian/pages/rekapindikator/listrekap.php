<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
    exit(header("Location:../index.php"));
}
?>

<div id="post">
    <div class="entry">
        <div align="center" class="link">
            <a href=?act=HomeAdmin>| Menu Utama |</a>
        </div>
        <div align="center" class="link">
            <a href=?act=ListRekap&bulan=Januari>| Januari |</a>
            <a href=?act=ListRekap&bulan=Februari>| Februari |</a>
            <a href=?act=ListRekap&bulan=Maret>| Maret |</a>
            <a href=?act=ListRekap&bulan=April>| April |</a>
            <a href=?act=ListRekap&bulan=Mei>| Mei |</a>
            <a href=?act=ListRekap&bulan=Juni>| Juni |</a>
            <a href=?act=ListRekap&bulan=Juli>| Juli |</a>
            <a href=?act=ListRekap&bulan=Agustus>| Agustus |</a>
            <a href=?act=ListRekap&bulan=September>| September |</a>
            <a href=?act=ListRekap&bulan=Oktober>| Oktober |</a>
            <a href=?act=ListRekap&bulan=November>| November |</a>
            <a href=?act=ListRekap&bulan=Desember>| Desember |</a>
        </div>
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>

            <div style="width: 100%; height: 78%; overflow: auto;">
                <?php
                $bulan      = isset($_GET['bulan']) ? $_GET['bulan'] : NULL;
                $ruangan   = "select nm_ruangan from ruangan_unit";
                $indikator   = "select nm_menu from menuindikator limit 13";
                $hasilindikator = bukaquery($indikator);
                $hasilruangan = bukaquery($ruangan);
                $barisindikator = mysqli_fetch_all($hasilindikator);
                $nilainumerator = querynumerator($bulan);
                $nilaidenumerator = querydenumerator($bulan);
                echo "<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                         <td><div align='center'>NO</div></td>
                         <td colspan=2><div align='center'>Indikator</div></td>";
                while ($barisruangan = mysqli_fetch_array($hasilruangan)) {
                    echo "<td><div align='center'>" . $barisruangan["nm_ruangan"] . "</div></td>";
                }
                echo "<td>Jumlah</td>";
                echo "<td>Pros</td>";

                echo "</tr>";
                $no = 1;

                foreach ($barisindikator as $key => $value) {
                    echo "<tr class='isi'>
                    <td rowspan=2>" . $no++ . "</td>
                    <td rowspan=2>" . $value[0] . "</td>
                    <td>N</td>";
                    $i = 0;
                    while ($i < 15) {
                        echo "<td>" . $nilainumerator[$key][$i] . "</td>";
                        $i++;
                    }
                    echo "<td >" . array_sum($nilainumerator[$key]) . "</td>";
                    if (array_sum($nilainumerator[$key]) == null || array_sum($nilaidenumerator[$key]) == null) {
                        echo "<td rowspan=2>0%</td>";
                    } else {
                        echo "<td rowspan=2>" . number_format((array_sum($nilainumerator[$key]) / array_sum($nilaidenumerator[$key])) * 100) . "%</td>";
                    }
                    echo "<tr class=isi>
                        <td>D</td>";
                    $i = 0;
                    while ($i < 15) {
                        echo "<td>" . $nilaidenumerator[$key][$i] . "</td>";
                        $i++;
                    }
                    echo "<td>" . array_sum($nilaidenumerator[$key]) . "</td>";

                    echo "</tr>";
                    echo "</tr>";
                }

                echo "</table>";
                ?>
            </div>
        </form>
        <?php
        echo ("<table width='99.6%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
        <tr class='head'>
            <td><div align='left'><a target=_blank href=../penggajian/pages/rekapindikator/laporanrekap.php?bulan=$bulan> Laporan </a> | <a target=_blank href=../penggajian/pages/rekapindikator/laporanrekapexcel.php?bulan=$bulan>Excel</a></div></td>
        </tr>
     </table>");
        ?>
    </div>
</div>