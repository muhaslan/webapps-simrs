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
                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                         <td><div align='center'>Aksi</div></td>
                         <td><div align='center'>Indikator</div></td>
                    </tr>
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=1>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Kebersihan Tangan</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=2>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Penggunaan APD</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=3>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Identifikasi Pasien</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=8>[List Data]</a>
                            </center>
                        </td>
                        <td>Pelaporan Hasil Kritis Lab</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=11>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Upaya Pencegahan Risiko Pasien Jatuh</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=14>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Pengisian Sign In Sign Out</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator2&menu=15>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Penyimpanan Obat High Alert</td>
                    </tr>";
                echo "</table>";
                ?>
            </div>
        </form>
    </div>
</div>