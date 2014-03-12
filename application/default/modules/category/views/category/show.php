<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri('listing'), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<fieldset>
					<legend><b>Category</b></legend>
					<div class="row-fluid">
						<span class="span3">
							Title
						</span>
						<input type="text" class="span9" name="name" value="<?php echo set_value('name'); ?>">
					</div>
					<div class="row-fluid">
						<span class="span3">
							Description
						</span>
						<textarea name="description" rows="10" class="span9"><?php echo set_value('description'); ?></textarea>
					</div>
					<div class="row-fluid">
						<span class="span3">
							Image
						</span>
						<input class='span9' type='file' name='image' />
						<?php if(@$id != null): ?>
			            	<img src="<?php echo base_url() ?>data/<?php echo set_value('image') ?>" width="100" height="" />
			            <?php endif ?>
					</div>
				</fieldset>
				<div class="action-buttons btn-group">
			        <input type="submit"/>
			        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
			    </div>
			</div>
		</div>
	</div>
</form>