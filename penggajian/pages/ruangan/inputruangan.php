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

            if ($action == "TAMBAH") {
                $id        = validTeks(isset($_GET['id']) ? $_GET['id'] : NULL);
            } else if ($action == "UBAH") {
                $_sql           = "SELECT * FROM ruangan_unit WHERE id_ruangan='$id'";
                $hasil          = bukaquery($_sql);
                $baris          = mysqli_fetch_row($hasil);
                $id             = $baris[0];
                $ruangan        = $baris[1];
            }

            echo "<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            echo "<div align='center' class='link'>
                          <a href=?act=ListRuangan>| List Data |</a>
                          <a href=?act=HomeAdmin>| Menu Utama |</a>
                          </div>";
            ?>
            <div style="width: 100%; overflow: auto;">
                <table width="100%">
                    <tr class="head">
                        <td width="25%">Ruangan/Unit</td>
                        <td width="">:</td>
                        <td width="75%"><input name="ruangan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo isset($ruangan) ? $ruangan : NULL; ?>" size="100" maxlength="100">
                            <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center"><input name="BtnSimpan" type="submit" class="button" value="SIMPAN">&nbsp;<input name="BtnKosong" type=reset class="button" value="KOSONG"></div>

            <?php
            $BtnSimpan = isset($_POST['BtnSimpan']) ? $_POST['BtnSimpan'] : NULL;
            $Btn = isset($_POST['BtnSimpan']) ? $_POST['BtnSimpan'] : NULL;
            if (isset($BtnSimpan)) {

                $id             = validTeks(str_replace("'", "`", trim($_POST['id'])));
                $ruangan        = validTeks(str_replace("'", "`", trim($_POST['ruangan'])));

                if ((!empty($ruangan))) {
                    switch ($action) {
                        case "TAMBAH":
                            Tambah(" ruangan_unit ", "'0','$ruangan'", " ruangan_unit ");
                            echo "<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputRuangan&action=TAMBAH'></head><body></body></html>";
                            break;
                        case "UBAH":
                            Ubah(" ruangan_unit ", " nm_ruangan='$ruangan' WHERE id_ruangan='$id'", " ruangan_unit ");
                            echo "<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputRuangan&action=UBAH&id=$id'></head><body></body></html>";
                            break;
                    }
                } else if (empty($indikator)) {
                    echo 'Semua field harus isi..!!';
                }
            }
            ?>
        </form>
    </div>
</div>