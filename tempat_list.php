<div class="page-header" style="border-bottom-color: dodgerblue; border-bottom-width: medium;">
    <h1 class="text-info">Tempat Masjid</h1>
</div>
<div id="map" style="height: 450px;"></div>

<script>
function tampilDekat(){

    var map_dekat = null;

    // getCurLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    getLocation();

    function showPosition(position) {

    map_dekat = new google.maps.Map(document.getElementById('map'), {
        zoom: <?=get_option('default_zoom')?>,
        center: {
            // lat : default_lat,
            lat : position.coords.latitude,
            // lng : default_lng
            lng : position.coords.longitude
        }
    });
    }

    var data =  <?=json_encode($db->get_results("SELECT * FROM tb_tempat"))?>;
    // console.log(data);
    $.each(data, function(k, v){
        // console.log(k+' k');
        // console.log(v.nama_tempat+' v');
        var pos = {
            lat : parseFloat(v.lat),
            lng : parseFloat(v.lng)
        };
        console.log(pos);

        var contentString = '<h3>'  + v.nama_tempat + '</h3>' +
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

$(function(){
    tampilDekat();
})
</script>