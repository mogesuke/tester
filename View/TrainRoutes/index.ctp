  <div class="row">
    <div class="col-md-4">
      <h2>Tokyo Metro Train Routes</h2>
      <div style="border:solid 1px; border-radius: 5px; padding:4px;">
 		再生ボタンをクリックすると路線名を読み上げます。<br>
 		路線名をクリックすると駅一覧に遷移します。<br>
		<br>
 		Please click play button. I will vocalization train name.<br>
 		Please click train name.　I will transition to the station list .
      </div>
		<?php foreach ($railways as $index => $item) { ?>
			<div class="logo logoTitle">
				<table>
					<tr>
						<td rowspan=2 style="padding:5px;">
							<img src='/img/flat/play.png' width="25" height="25" onclick="audioPlay('<?php echo $item->{'railEnName'} ?>')">
							<img src='/img/metoro/<?php echo $item->{'railEnName'} ?>.png' width="30" height="30">
						</td>
						<td style="font-size:small;"><a href="/trainRoutes/<?php echo $index ?>"><?php echo $item->{'railEnName'} ?>Line</a></td>
					</tr>
					<tr>
						<td><a href="/trainRoutes/<?php echo $index ?>"><?php echo $item->{'railJaName'} ?></a></td>
					</tr>
				</table>
			</div>
		<?php } ?>
    </div>
  </div>
  <hr>
<div class="hide">
	<audio id="audio" controls>
		<source id="audioSource" src="">
	</audio>
</div>

<script type="text/javascript">
	function audioPlay(fileName) {
		audio = new Audio("");
		$url = "/files/" + fileName + ".mp3";
		audio = new Audio("");
		audio.src = $url;
		audio.play();
	}
</script>