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
                                <a href=?act=ListIndikator7&menu=20>[List Data]</a>
                            </center>
                        </td>
                        <td>Hasil Kritis Radiologi</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=21>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Pengisian Asesmen Gizi</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=22>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Pemberian Antibiotik</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=23>[List Data]</a>
                            </center>
                        </td>
                        <td>Kematian Ibu Akibat Persalinan</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=14>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Pengisian Sign In Sign Out</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=24>[List Data]</a>
                            </center>
                        </td>
                        <td>Ketetapan Alur Strerilisasi CSSD</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=15>[List Data]</a>
                            </center>
                        </td>
                        <td>Emergency Response Time</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=11>[List Data]</a>
                            </center>
                        </td>
                        <td>Kepatuhan Upaya Pencegahan Risiko Pasien Jatuh</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=18>[List Data]</a>
                            </center>
                        </td>
                        <td>Waktu Tunggu Rawat Jalan</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=8>[List Data]</a>
                            </center>
                        </td>
                        <td>Pelaporan Hasil Kritis Lab</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=25>[List Data]</a>
                            </center>
                        </td>
                        <td>Ketepatan Waktu Penyediaan Linen Rawat Inap</td>
                    </tr>";
                echo "
                    <tr class='isi'>
                        <td width='70'>
                            <center>
                                <a href=?act=ListIndikator7&menu=15>[List Data]</a>
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