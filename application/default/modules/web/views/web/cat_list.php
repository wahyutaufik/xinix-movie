<div id="outer-wrapper">
	<div id="wrap2">
		<div class="switch">
			<div class="switch-left">
				<?php foreach ($category as $key => $item) : ?>
				<span style="color: #aaa;">Category</span> <?php echo $item['name'];?>
				<?php endforeach ?>
			</div>
		</div>
		<?php foreach ($film as $item):?>
		<div class="post bar hentry">
			<h2 class="post-title entry-title">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>"><?php echo $item['title']?></a>
			</h2>
			<div class="post-body entry-content">
				<a href="<?php echo site_url('web/detail_film/'.$item['id'])?>">
		            <img src ="<?php echo base_url('data/').'/'.$item['cover'] ?>">
				</a>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clear"></div>
        <div>
            <?php echo $this->pagination->create_links() ?>
        </div>
        <div class="clear"></div>
	</div>
</div>