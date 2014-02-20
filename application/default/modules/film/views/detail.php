<style type="text/css">
    .desktop {text-align: center;}
</style>
<fieldset>
	<legend><?php echo $film['title'] ?></legend>
	<div class="row-fluid">
		<div class="span2">
	       	<img src="<?php echo base_url() ?>data/<?php echo $film['cover']; ?>" width="150" height="" />
		</div>
		<div class="span8">
			<?php echo nl2br($film['description']) ?><br>
			<a class="btn btn-primary" href="<?php echo base_url('data/film/filmnya/').'/'.$film['title'].'.zip' ?>"><?php echo l('Download') ?></a>
		</div>
		<div class="span2">
		</div>
	</div>
</fieldset>
<div class="action-buttons btn-group">
    <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Back') ?></a>
</div>