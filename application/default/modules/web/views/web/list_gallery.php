<div class="news-detail">
	<div class="breadcrumb">
		<div class="container">
			<ul class="flat">
				<li><span></span></li>
				<li>
					<a href="<?php echo site_url()?>">Beranda</a>
				</li>
				<li>\</li>
				<li>
					<a href="<?php echo site_url('web/list_gallery')?>">Galeri</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="gallery">
		<div class="container">
			<div class="title-desc">
				<h2 class="title">Foto Kegiatan</h2>
				<h4>Kumpulan foto-foto hasil dari dokumentasi kegiatan YAKKAP</h4>
			</div>
			<div class="gallery-thumb">
				<div class="thumb">
					<ul class="flat">
						<?php $i = 0; foreach ($gallerys as $item):?>
							<li>
								<a href="<?php echo site_url('web/detail_gallery/'.$item['id'])?>">
									<img class="rounded" src="<?php echo data_url($item['image'],'normal')?>" width="200" height="200" />
								</a>
								<h6>
									<a href="<?php echo site_url('web/detail_gallery/'.$item['id'])?>"><?php echo $item['name']?></a>
								</h6>
							</li>
							<?php 
								$i++;

								if ($i % 4 == 0) {
									echo "</ul>";
									echo "</div class='thumb'>";
									echo "<div class='thumb'>";
									echo "<ul class='flat'>";
									// echo "<div class='clear-fix'></div>";
								}
							?>
						<?php endforeach;?>
					</ul>
				</div>
				<?php if (!$this->input->is_ajax_request()): ?>
			        <?php echo $this->pagination->create_links_web() ?>
			    <?php endif ?>
			</div>
		</div>
	</div>
</div>