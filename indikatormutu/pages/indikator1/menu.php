<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
    exit(header("Location:../index.php"));
}
?>
<div id="post">
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <div align='center' class='link'>
                <a href=?act=Home>| Menu Utama |</a>
            </div>
            <div style="width: 100%; height: 78%; overflow: auto;">
                <?php
                $_sql = "select * from menuindikator limit 13";
                $hasil = bukaquery($_sql);
                $jumlah = mysqli_num_rows($hasil);
                if (mysqli_num_rows($hasil) != 0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                         <td><div align='center'>Aksi</div></td>
                         <td><div align='center'>Indikator</div></td>
                    </tr>";
                    while ($baris = mysqli_fetch_array($hasil)) {
                        echo "<tr class='isi' title='$baris[1]'>
                                  <td width='70'>
                                        <center>
                                        <a href=?act=ListIndikator1&menu=$baris[0]>[List Data]</a>
                                        ";
                        echo "       </center>
                                </td>
                                <td><a href=?act=InputIndikator1&action=UBAH&id=$baris[0]>" . $baris["nm_menu"] . "</a></td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                  <tr class='head'>
                       <td><div align='center'>Indikator</div></td>
                  </tr>
              </table>";
                }
                ?>
            </div>
        </form>
    </div>
</div>