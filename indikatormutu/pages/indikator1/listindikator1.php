<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
    exit(header("Location:../index.php"));
}
?>

<div id="post">
    <div class="entry">
        <?php
        $menu          = validTeks(isset($_GET['menu']) ? $_GET['menu'] : NULL);
        ?>

        <div align="center" class="link">
            <a href=?act=MenuIndikator1>| List Indikator |</a>
            <a href=?act=InputIndikator1&action=TAMBAH&menu=<?= $menu ?>>| Input Data |</a>
            <a href=?act=Home>| Menu Utama |</a>
        </div>
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>

            <div style="width: 100%; height: 78%; overflow: auto;">
                <?php
                $_sql = "SELECT * FROM `indikator1` JOIN ruangan_unit ON ruangan_unit.id_ruangan = indikator1.ruangan WHERE id_menuindikator = $menu";
                $hasil = bukaquery($_sql);

                if (mysqli_num_rows($hasil) != 0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                         <td><div align='center'>Aksi</div></td>
                         <td><div align='center'>Bulan</div></td>
                         <td><div align='center'>Tahun</div></td>
                         <td><div align='center'>Ruangan/Unit</div></td>
                         <td><div align='center'>Numerator</div></td>
                         <td><div align='center'>Denumerator</div></td>
                    </tr>";
                    while ($baris = mysqli_fetch_array($hasil)) {
                        $totaln[] = $baris['numerator'];
                        $totald[] = $baris['denumerator'];
                        echo "<tr class='isi' title='$baris[1] $baris[2]'>
                                  <td width='70'>
                                        <center>
                                        <a href=?act=InputIndikator1&action=UBAH&id=$baris[0]&menu=$menu>[edit]</a>";
                        echo "       </center>
                                </td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["bulan"] . "</a></td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["tahun"] . "</a></td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["nm_ruangan"] . "</a></td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["numerator"] . "</a></td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["denumerator"] . "</a></td>
                              </tr>";
                    }
                    $jmnumerator = array_sum($totaln);
                    $jmdenumerator = array_sum($totald);
                    echo "<tr class='isi'>
                            <td colspan=4>
                            <center>
                            Jumlah
                            </center>
                            </td>
                            <td>$jmnumerator</td>
                            <td>$jmdenumerator</td>
                          </tr>
                    ";
                    echo "</table>";
                } else {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                  <tr class='head'>
                       <td><div align='center'>Bulan</div></td>
                       <td><div align='center'>Tahun</div></td>
                       <td><div align='center'>Ruangan.Unit</div></td>
                       <td><div align='center'>Numerator</div></td>
                       <td><div align='center'>Denumerator</div></td>
                  </tr>
              </table>";
                }
                ?>
            </div>
        </form>
    </div>
</div>