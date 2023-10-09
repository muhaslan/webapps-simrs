<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
    exit(header("Location:../index.php"));
}
?>

<div id="post">
    <div class="entry">
        <div align="center" class="link">
            <a href=?act=InputMenuIndikator&action=TAMBAH>| Input Data |</a>
            <a href=?act=HomeAdmin>| Menu Utama |</a>
        </div>
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>

            <div style="width: 100%; height: 78%; overflow: auto;">
                <?php
                $_sql = "select * from menuindikator";
                $hasil = bukaquery($_sql);

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
                                        <a href=?act=InputMenuIndikator&action=UBAH&id=$baris[0]>[edit]</a>
                                        <a href=?act=ListMenuIndikator&action=HAPUS&id=$baris[0]>[hapus]</a>
                                        ";
                        echo "       </center>
                                </td>
                                <td>" . $baris["nm_menu"] . "</td>
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
                $aksi = isset($_GET['action']) ? $_GET['action'] : NULL;
                $id          = validTeks(isset($_GET['id']) ? $_GET['id'] : NULL);
                if ($aksi == "HAPUS") {
                    Hapus(" menuindikator ", " id_menu ='" . $id . "' ", "?act=ListMenuIndikator");
                }
                ?>
            </div>
        </form>
    </div>
</div>