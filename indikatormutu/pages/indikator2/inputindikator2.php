<?php
if (strpos($_SERVER['REQUEST_URI'], "pages")) {
    exit(header("Location:../index.php"));
}
?>
<div id="post">
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
            $action      = isset($_GET['action']) ? $_GET['action'] : NULL;
            $id          = validTeks(isset($_GET['id']) ? $_GET['id'] : NULL);
            $menu          = validTeks(isset($_GET['menu']) ? $_GET['menu'] : NULL);

            if ($action == "TAMBAH") {
                $id        = validTeks(isset($_GET['id']) ? $_GET['id'] : NULL);
            } else if ($action == "UBAH") {
                $_sql           = "SELECT `id_indikator2`, `bulan`, `ruangan`, `numerator`, `denumerator`, `id_menuindikator2`,`nm_ruangan` FROM indikator2 JOIN ruangan_unit ON ruangan_unit.id_ruangan = indikator2.ruangan WHERE id_indikator2='$id'";
                $hasil          = bukaquery($_sql);
                $baris          = mysqli_fetch_row($hasil);
                $id             = $baris[0];
                $bulan          = $baris[1];
                $idruangan      = $baris[2];
                $numerator      = $baris[3];
                $denumerator    = $baris[4];
                $menu           = $baris[5];
                $ruangan        = $baris[6];
                $tahun          = $baris[7];
            }

            echo "<input type=hidden name=id value=$id><input type=hidden name=action value=$action><input type=hidden name=menu value=$menu>";

            echo "<div align='center' class='link'>
                          <a href=?act=MenuIndikator2>| List Indikator |</a>
                          <a href=?act=ListIndikator2&menu=$menu>| List Data |</a>
                          <a href=?act=Home>| Menu Utama |</a>
                          </div>";
            ?>
            <div style="width: 100%; height: 88%; overflow: auto;">
                <table width="100%">
                    <tr class="head">
                        <td width="25%">Bulan </td>
                        <td width="">:</td>
                        <td width="25%">
                            <select name="bulan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi16'));" id="TxtIsi16">
                                <?php
                                if ($action == "UBAH") {
                                    echo "<option id='TxtIsi16' value=$bulan>$bulan</option>";
                                }
                                blnStr();
                                ?>
                            </select>
                            <span id="MsgIsi16" style="color:#CC0000; font-size:10px;"></span>
                        </td>
                        <td width="25%">Ruangan</td>
                        <td width="">:</td>
                        <td width="25%">
                            <select name="ruangan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi16'));" id="TxtIsi16">
                                <?php
                                if ($action == "UBAH") {
                                    echo "<option id='TxtIsi16' value=$idruangan>$ruangan</option>";
                                }
                                $sql = "select * from ruangan_unit";
                                $h = bukaquery($sql);
                                while ($baris = mysqli_fetch_array($h)) {
                                    echo "<option value=$baris[0]>$baris[1]</option>";
                                }

                                ?>
                            </select>
                            <span id="MsgIsi16" style="color:#CC0000; font-size:10px;"></span>
                        </td>
                    </tr>
                    <tr class="head">
                        <td width="25%">Numerator</td>
                        <td width="">:</td>
                        <td width="25%"><input name="numerator" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo isset($numerator) ? $numerator : NULL; ?>" size="20" maxlength="20" autofocus>
                            <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                        </td>
                    </tr>
                    <tr class="head">
                        <td width="25%">Denumerator</td>
                        <td width="">:</td>
                        <td width="25%"><input name="denumerator" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo isset($denumerator) ? $denumerator : NULL; ?>" size="20" maxlength="20" autofocus>
                            <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                        </td>
                    </tr>

                    <input type="hidden" name="menu" value="<?= $menu ?>">
                    <input type="hidden" name="tahun" value="<?= $tahun ?>">
                </table>
            </div>
            <div align="center"><input name="BtnSimpan" type="submit" class="button" value="SIMPAN">&nbsp;<input name="BtnKosong" type=reset class="button" value="KOSONG"></div>

            <?php
            $BtnSimpan = isset($_POST['BtnSimpan']) ? $_POST['BtnSimpan'] : NULL;
            $Btn = isset($_POST['BtnSimpan']) ? $_POST['BtnSimpan'] : NULL;
            if (isset($BtnSimpan)) {

                $id             = validTeks(str_replace("'", "`", trim($_POST['id'])));
                $bulan          = validTeks(str_replace("'", "`", trim($_POST['bulan'])));
                $idruangan      = validTeks(str_replace("'", "`", trim($_POST['ruangan'])));
                $numerator      = validTeks(str_replace("'", "`", trim($_POST['numerator'])));
                $denumerator    = validTeks(str_replace("'", "`", trim($_POST['denumerator'])));
                $menu           = validTeks(str_replace("'", "`", trim($_POST['menu'])));
                $tahun          = validTeks(str_replace("'", "`", trim($_POST['tahun'])));
                if ((!empty($bulan)) && (!empty($idruangan)) && (!empty($numerator)) && (!empty($denumerator) && (!empty($menu)) && (!empty($tahun)))) {
                    switch ($action) {
                        case "TAMBAH":
                            Tambah(" indikator2 ", "'0','$bulan','$idruangan','$numerator','$denumerator','$menu','$tahun'", " indikator2 ");
                            echo "<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputIndikator2&action=TAMBAH&menu=$menu'></head><body></body></html>";
                            break;
                        case "UBAH":
                            Ubah(" indikator2 ", " bulan='$bulan',ruangan='$idruangan',numerator='$numerator',denumerator='$denumerator', id_menuindikator='$menu',tahun ='$tahun' WHERE id_indikator2='$id'", " indikator2 ");
                            echo "<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputIndikator2&action=UBAH&id=$id&menu=$menu'></head><body></body></html>";
                            break;
                    }
                } else if (
                    empty($bulan) || empty($idruangan) || empty($numerator) || empty($denumerator) || empty($menu) || empty($tahun)

                ) {
                    echo 'Semua field harus isi..!!';
                }
            }
            ?>
        </form>
    </div>
</div>