<form method="POST" action="" enctype="multipart/form-data">
	<div id="outer-wrapper">
		<div id="wrap2">
			<div class="switch">
				<div class="switch-left">
					<span style="color: #aaa;">Request</span> Movies
				</div>
			</div>
			<div class="post">
				<div class="row-fluid">
					<div class="span5">
						<h2 class="post-title entry-title">
							<textarea name="content" id="" rows="5"><?php echo set_value('content') ?></textarea>
						</h2>
						<input type="submit" class="btn btn-primary">
					</div>
					<div class="span7">
						<?php foreach ($request as $req):?>
						<div class="row-fluid">
							<div class="span1">
								<img src="<?php echo base_url() ?>data/<?php echo format_model_param($req['user_id'],'user','','',array('image')) ?>" width="50px"/>
							</div>
							<div class="span11">
								<a href="<?php echo site_url('web/detail_user')?>"><span style="color: #02ADD8;"><?php echo format_model_param($req['user_id'],'user','','',array('username')); ?></span></a> Request <br>
								<?php echo $req['created_time']; ?><br>
								<?php echo $req['content']; ?>
								</div>
						</div><br><br>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</form>