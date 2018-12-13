<?php
$row = $db->get_row("SELECT * FROM tb_galeri WHERE id_galeri='$_GET[ID]'");
?>
<div style="font-family: 'Roboto', 'sans-serif'; color: #073642">
    <h1>Ubah Galeri</h1>
    <div style="height: 3px; background-color: #073642; width: max-content; margin: 5px 0px 10px 0px;"></div>
</div>
<div class="row">
    <?php if ($_POST) include 'aksi.php' ?>
    <form method="post" action="?m=galeri_ubah&ID=<?= $row->id_galeri ?>" enctype="multipart/form-data">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tempat <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_tempat">
                            <?= get_tempat_option($row->id_tempat) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input class="form-control" type="file" name="gambar"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img class="thumbnail" src="assets/images/galeri/small_<?= $row->gambar ?>" style="height: 110px; margin-top: 25px;"/>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Foto</label>
                <input class="form-control" type="text" name="nama_galeri" value="<?= $row->nama_galeri ?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="ket_galeri"><?= $row->ket_galeri ?></textarea>
            </div>
        </div>
    </form>
</div>