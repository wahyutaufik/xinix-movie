<div id="outer-wrapper">
	<div id="wrap2">
        <div class="switch">
            <div class="switch-left">
                <span style="color: #aaa;">Category</span> Movies
            </div>
        </div>
        <?php foreach ($category_film as $key => $cat_film) : ?>
            <div class="post bar hentry">
                <h2 class="post-title entry-title">
                    <a href="<?php echo site_url('web/cat_list/'.$cat_film['id'])?>"><?php echo $cat_film['name'] ?></a>
                </h2>
                <a href="<?php echo site_url ('web/cat_list/'.$cat_film['id']) ?>" title="">
                    <img src ="<?php echo base_url('data/').'/'.$cat_film['image'] ?>" width="150" height="150">
                </a>
            </div>
        <?php endforeach ?>
        <div class="clear"></div>
    </div>
</div>