<?php
    $row = $db->get_row("SELECT * FROM tb_tempat WHERE id_tempat='$_GET[ID]'"); 
?>
<div style="font-family: 'Roboto', 'sans-serif'; color: #073642">
    <h1>Ubah Tempat</h1>
    <div style="height: 3px; background-color: #073642; width: max-content; margin: 5px 0px 10px 0px;"></div>
</div>
<div class="row">
    <?php if($_POST) include'aksi.php'?>
    <form method="post" action="?m=tempat_ubah&ID=<?=$row->id_tempat?>" enctype="multipart/form-data">
    <div class="col-sm-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Tempat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_tempat" value="<?=$row->nama_tempat?>"/>
                    </div>
                    <div class="form-group">
                        <label>Gambar <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="gambar" />
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="thumbnail" src="assets/images/tempat/small_<?=$row->gambar?>" style="height: 110px; margin-top: 24px;" />
                </div>
            </div>

            <div class="form-group">
                <label>Lokasi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?=$row->lokasi?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="mce" name="keterangan"><?=$row->keterangan?></textarea>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="form-group" style="margin-left: 15px;">
                    <button class="btn" style="background-color: green; color: white;"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                    <a class="btn btn-warning" href="?m=tempat"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </div>
    </div>
    <div class="col-md-6">
        <div id="map" style="height: 400px;"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Latitude <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="lat" name="lat" value="<?=$row->lat?>"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Longitude <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="lng" name="lng" value="<?=$row->lng?>"/>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script>
var defaultCenter = {
    lat : <?=$row->lat * 1?>, 
    lng : <?=$row->lng * 1?>
};
function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: <?=get_option('default_zoom')?>,
    center: defaultCenter 
  });

  var marker = new google.maps.Marker({
    position: defaultCenter,
    map: map,
    title: 'Click to zoom',
    draggable:true
  });
  
  
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);
    
    var infowindow = new google.maps.InfoWindow({
        content: '<h4>Drag untuk pindah lokasi</h4>'
    });
    
    infowindow.open(map, marker);
}

function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
}

$(function(){
    initMap();
})
</script>