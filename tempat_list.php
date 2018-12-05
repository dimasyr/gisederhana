<div class="page-header" style="border-bottom-color: dodgerblue; border-bottom-width: medium;">
    <h1 class="text-info">Tempat Masjid</h1>
</div>
<div id="map" style="height: 450px;"></div>
<script>
function tampilDekat(){
    // var posisi = getCurLocation();
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function success(position) {
        map_dekat = new google.maps.Map(document.getElementById('map'), {
            zoom: <?=get_option('default_zoom')?>,
            center: {
                lat : position.coords.latitude,
                lng : position.coords.longitude
            }
        });

        var data =  <?=json_encode($db->get_results("SELECT * FROM tb_tempat"))?>;
        $.each(data, function(k, v){
            var pos = {
                lat : parseFloat(v.lat),
                lng : parseFloat(v.lng)
            };

            var foto = <?=json_encode($db->get_results("SELECT * FROM tb_galeri WHERE id_tempat = ?> <?="))?>;

            var contentString = '<h5>'  + v.nama_tempat + '</h5>' + '<br>'+
                    '<img src="/assets/images/galeri/">' + '<br>'+
                '<p align="center"><a href="?m=tempat_detail&ID=' + v.id_tempat + '" class="link_detail btn btn-primary">Lihat Detail</a>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var marker = new google.maps.Marker({
                position: pos,
                map: map_dekat,
                animation: google.maps.Animation.DROP
            });
            marker.addListener('click', function() {
                infowindow.open(map_dekat, marker);
            });
        });
    }
    getLocation();
    ///batas lama
}  

$(function(){
    tampilDekat();
})
</script>