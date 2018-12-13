<div style="font-family: 'Roboto', 'sans-serif'; color: #073642">
    <h1>Tambah Foto</h1>
    <div style="height: 3px; background-color: #073642; width: max-content; margin: 5px 0px 10px 0px;"></div>
</div>
<div class="row">
    <?php if ($_POST) include 'aksi.php' ?>
    <form method="post" action="?m=galeri_tambah" enctype="multipart/form-data">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Tempat <span class="text-danger">*</span></label>
                <select class="form-control" name="id_tempat">
                    <?= get_tempat_option($_POST[id_tempat]) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="gambar"/>
            </div>
            <div class="form-group">
                <label>Nama Galeri</label>
                <input class="form-control" type="text" name="nama_galeri" value="<?= $_POST[nama_galeri] ?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="ket_galeri"><?= $_POST['ket_galeri'] ?></textarea>
            </div>
        </div>
    </form>
</div>