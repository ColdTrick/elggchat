<?php 

	$latest_river = elgg_view_river_items(null, 0, $content_type, $content[0], $content[1], '', 1,0,0,false);

?>
<div id="latest_river"><?php echo $latest_river;?></div>