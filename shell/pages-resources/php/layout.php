<div class="album-wrapper">
	<div class="album-container" onclick="location.href='<?php print $albums[$i]['url']?>';">
		<div class="album-content" style="background-image: url(<?php print $albums[$i]['thumbnail']?>);">
			<a href="<?php print $albums[$i]['url']?>"><img src="pages-resources/images/blank.gif" class="captify" alt="<?php print $albums[$i]['title']?>" /></a>
		</div>
	</div>
	<div class="album-copy">
		<p class="album-title"><?php print $albums[$i]['title']?></p>
		<p class="album-description"><?php print $albums[$i]['description']?></p>
	</div>
</div>

