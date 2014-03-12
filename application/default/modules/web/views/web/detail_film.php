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
					<div class="row-fluid">
						<div class="span2">
							<b><?php echo l('Category') ?></b>		
						</div>
						<div class="span1">:</div>
						<div class="span4">
							<?php echo format_model_param($film['category_id'],'category'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span2">
							<b><?php echo l('Size') ?></b>		
						</div>
						<div class="span1">:</div>
						<div class="span4">
							<?php echo ($film['size']); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span2">
							<b><?php echo l('Quality') ?></b>
						</div>
						<div class="span1">:</div>
						<div class="span4">
							<?php echo format_param_short($film['quality'],'quality'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span2">
							<b><?php echo l('Sinopsis') ?></b>
						</div>
						<div class="span1">:</div>
						<div class="span9">
							<?php echo nl2br($film['description']) ?>
						</div>
					</div><br><br>
					<div class="row-fluid">
						<div class="span2">
							<b><?php echo l('Trailer') ?></b>
						</div>
						<div class="span1">:</div>
						<div class="span9">
							<?php  
								$film_code = $film['trailer'];
								$youtube = explode("v=", $film_code);
							?>
							<?php if(!empty($film['trailer'])) : ?>
								<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $youtube[1] ?>" frameborder="0" allowfullscreen></iframe>
							<?php endif ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>