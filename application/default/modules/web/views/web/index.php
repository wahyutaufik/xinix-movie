<div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<span style="color: #aaa;">Recent</span> Movies
			</div>
		</div>
		<?php $i = 0; foreach ($film as $item):?>
		<div class="post bar hentry">
			<h2 class="post-title entry-title">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>"><?php echo $item['title']?></a>
			</h2>
			<div class="post-body entry-content">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>">
		            <img src ="<?php echo base_url('data/').'/'.$item['cover'] ?>">
				</a>
			<?php 
				$i++;

				if ($i % 4 == 0) {
					// echo "</ul>";
					// echo "</div class='thumb'>";
					// echo "<div class='thumb'>";
					// echo "<ul class='flat'>";
					// echo "<div class='clear-fix'></div>";
				}
			?>
			</div>
		</div>
		<?php endforeach;?>
	</div>
	<div class="clear"></div>	
</div>