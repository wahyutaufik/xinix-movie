<script type="text/javascript" src="<?php echo theme_url('js/jquery-1.8.2.min.js')?>"></script>
<script type="text/javascript">
   $(function() {
       $('select[name="province_id"]').change(function() {

           $.getJSON("<?php echo site_url('rpc/get_city_by_prov') ?>/" + $(this).val(), '', function(data) {
               $('#dept-box option').remove()

               $.each(data, function(i, o) {
                   $('<option value="' + o.id + '">' + o.name + '</option>').appendTo($('#dept-box'));
               });

           });

       });
   });
</script>
<div class="news-detail">
			<div class="breadcrumb">
				<div class="container">
					<ul class="flat">
						<li><span></span></li>
						<li>
							<a href="#">Beranda</a>
						</li>
						<li>\</li>
						<li>
							<a href="#">BPJS</a>
						</li>
						<li>\</li>
						<li>
							<a href="#">Daftar Fasilitas BPJS</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="list-facilities">
				<div class="container">
					<div class="title-desc">
						<h2 class="title">Daftar Fasilitas BPJS</h2>
						<h4>Daftar fasilitas kesehatan bagi peserta BPJS Kesehatan</h4>
					</div>
					<nav class="facility-menu">
					<form action="<?php echo site_url('web/list_facility') ?>" method="POST">
						<ul class="flat">
							<li>
								<?php echo form_dropdown('province_id', $province_options) ?>
							</li>																							
							<li>
								<?php echo form_dropdown('city_id', $city_options, array(), 'id="dept-box"') ?>
							</li>
							<li>
								<?php echo xform_lookup('facility_level') ?>
							</li>
							<li>
								<?php echo xform_lookup('facility_type') ?>
							</li>
							<li>
                                <input type="text" name="name" placeholder="Nama Fasilitas">
                                <input type="submit" value="Cari">
							</li>
						</ul>
					</form>
					</nav>
					<div class="content-facilities">
						<div class="list">
							<div>
								<div class="table-container">
									<table class="table nowrap stripped">
										<thead>
											<tr>
												<th><?php echo l('Provinsi')?></th>
												<th><?php echo l('Kabupaten/Kota')?></th>
												<th><?php echo l('Tingkat Fasilitas')?></th>
												<th><?php echo l('Tipe Fasilitas')?></th>
												<th><?php echo l('Nama Fasilitas')?></th>
												<th><?php echo l('Alamat')?></th>
												<th><?php echo l('Telepon')?></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($data['items'] as $item):?>
											<?php //xlog($item);?>
											<tr>
												<td><?php echo format_model_param($item['province_id'],'province')?></td>
												<td><?php echo format_model_param($item['city_id'],'city')?></td>
												<td><?php echo format_param_short($item['facility_level'],'facility_level')?></td>
												<td><?php echo format_param_short($item['facility_type'],'facility_type')?></td>
												<td><?php echo $item['name']?></td>
												<td><?php echo $item['address']?></td>
												<td><?php echo $item['phone']?></td>
											</tr>
										<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<div class="paging-table">
									<?php if (!$this->input->is_ajax_request()): ?>
									    <div class="row">
									        <div class="span-6 pull-left">
									            <?php echo $this->pagination->per_page_changer() ?>
									        </div>
									        <div class="span-6 pull-right">
									            <?php echo $this->pagination->create_links() ?>
									        </div>
									    </div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>