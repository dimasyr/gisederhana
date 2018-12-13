<div style="font-family: 'Roboto', 'sans-serif'; color: #073642">
    <h1>Tambah Tempat</h1>
    <div style="height: 3px; background-color: #073642; width: max-content; margin: 5px 0px 10px 0px;"></div>
</div>
<form method="post" action="?m=tempat_tambah" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <?php if ($_POST) include 'aksi.php' ?>
            <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tempat" value="<?= $_POST['nama_tempat'] ?>"/>
            </div>
            <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="gambar"/>
            </div>

            <div class="form-group">
                <label>Lokasi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?= $_POST['lokasi'] ?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="keterangan"><?= $_POST['keterangan'] ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn" style="background-color: green; color: white;"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-warning" href="?m=tempat"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="map" style="height: 400px;"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Latitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="lat" id="lat" value="<?= $_POST['lat'] ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Longitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="lng" name="lng" value="<?= $_POST['lng'] ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>

    function initMap() {
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function success(position) {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: <?=get_option('default_zoom')?>,
                center: {
                    lat : position.coords.latitude,
                    lng : position.coords.longitude
                }
            });

            var marker = new google.maps.Marker({
                position: {
                    lat : position.coords.latitude,
                    lng : position.coords.longitude
                },
                map: map,
                title: 'Click to zoom',
                draggable: true
            });


            marker.addListener('drag', handleEvent);
            marker.addListener('dragend', handleEvent);

            var infowindow = new google.maps.InfoWindow({
                content: '<h4>Drag untuk pindah lokasi</h4>'
            });

            infowindow.open(map, marker);
        }

        getLocation();
    }

    function handleEvent(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    }

    $(function () {
        initMap();
    })
</script>