<div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<span style="color: #aaa;">MOVIE | </span><?php echo $film['title']?>
				<!-- <span style="color: #aaa;">PAPA</span> jahat -->
			</div>
		</div>
		<div class="post">
			<div class="row-fluid">
				<div class="span3">
					<img src ="<?php echo base_url('data/').'/'.$film['cover'] ?>" width="200">		
				</div>
				<div class="span6">
					<b><?php echo l('Category') ?></b> : <?php echo format_model_param($film['category_id'],'category'); ?><br>		
					<b><?php echo l('Sinopsis') ?></b> :<br> <?php echo nl2br($film['description']) ?>
				</div>
			</div>
		</div>
	</div>
</div>