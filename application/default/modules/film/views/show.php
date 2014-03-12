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
					<legend><b>MOVIE LIST</b></legend>
					<div class="row-fluid">
						<span class="span3">
							Title
						</span>
						<input type="text" class="span9" name="title" value="<?php echo set_value('title'); ?>">
					</div>
					<div class="row-fluid">
						<span class="span3">
							Description
						</span>
						<textarea name="description" rows="10" class="span9"><?php echo set_value('description'); ?></textarea>
					</div>
					<div class="row-fluid">
						<span class="span3">
							Trailer
						</span>
						<input type="text" class="span9" name="trailer" value="<?php echo set_value('trailer'); ?>">
					</div>
					<div class="row-fluid">
						<span class="span3">
							Category
						</span>
						<?php echo form_dropdown('category_id', $category_options) ?>
					</div>
					<div class="row-fluid">
						<span class="span3">
							Cover
						</span>
						<input class='span9' type='file' name='cover' />
						<?php if(@$id != null): ?>
			            	<img src="<?php echo base_url() ?>data/<?php echo set_value('cover') ?>" width="100" height="" />
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