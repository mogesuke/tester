<div class="row">
	<div class="col-md-4">
		<h2>
			<table>
			<tr>
				<td rowspan=2 style="padding:5px;">
		      	<img src='/img/flat/play.png' width="25" height="25" onclick="audioPlay('<?php echo $railway->{'railEnName'} ?>')">
		      	<img src='/img/metoro/<?php echo $railway->{'railEnName'} ?>.png' width="30" height="30">
		    </td>
		    <td style="font-size:medium;"><?php echo $railway->{'railEnName'} ?>Line</td>
		</tr>
			<tr>
				<td><?php echo $railway->{'railJaName'} ?></td>
			</tr>
		</table>
		</h2>

      <div style="border:solid 1px; border-radius: 5px; padding:4px;">
 		再生ボタンをクリックすると駅名を読み上げます。<br>
 		路線名をクリックするとgooglemapに表示します。<br>
		<br>
 		Please click play button. I will vocalization station name.<br>
 		Please click train name.　I will display on googlemap.
      </div>

		<table id="listArea" style="margin-top:10px;">
		<tr>
			<td Valign="top">
				<?php foreach ($railway->{'odpt:stationOrder'} as $item) { ?>
				<div class="logo logoTitle">
					<table>
					<tr>
						<td rowspan="2" style="padding:5px;">
						<img src='/img/flat/play.png' width="25" height="25" onclick="audioPlay('<?php echo $item->{'stationFileName'} ?>')">
						</td>
						<td style="font-size:small;"><?php echo $item->{'stationEnName'} ?></td>
					</tr>
					<tr>
						<td valign="top" class="station" style="top:100;"><?php echo $item->{'stationJaName'} ?></td>
					</tr>
					</table>
				</div>
				<?php } ?>
			</td>
			<td Valign="top">
				<div id="map_canvas" style="width:300px; height:400px"></div>
			<td>
		</tr>
		</table>
	</div>
</div>
<hr>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC4M0x2_W_4CWP_pYyaxPtcB6muSUDXtdk&sensor=FALSE">
</script>

<script>
	$(function() {
		initialize();
		codeAddress($($(".station").get(0)).html() + "駅");
		$($(".station").get(0)).addClass("stationSelected");

		$("#map_canvas").height($("#listArea").height());

		$("td.station").click(function() {
			codeAddress($(this).html() + "駅");
			$("td.station").removeClass("stationSelected");
			$(this).addClass("stationSelected");
		});
	});
</script>

<script type="text/javascript">
	var geocoder;
	var map;
	var marker;
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var mapOptions = {
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		marker = new google.maps.Marker();
	}

	function codeAddress(searchKey) {
		if (geocoder) {
			geocoder.geocode( { 'address': searchKey, 'region': 'jp'},
			function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var bounds = new google.maps.LatLngBounds();
					marker.setMap(null);
					for (var r in results) {
						if (results[r].geometry) {
							var latlng = results[r].geometry.location;
							bounds.extend(latlng);
							marker = new google.maps.Marker({
							    position: latlng, map: map
    						});
						}
					}
				} else {
					alert("Geocode 取得に失敗しました reason: "　+ status);
				}
			});
		}
	}
</script>

<script type="text/javascript">
	function audioPlay(fileName) {
		audio = new Audio("");
		$url = "/files/" + fileName + ".mp3";
		audio = new Audio("");
		audio.src = $url;
		audio.play();
	}
</script>