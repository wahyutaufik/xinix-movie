<div class="header">
    <div class="pull-left">
        <?php echo $this->admin_panel->breadcrumb() ?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="grid-top">
    <div class="pull-left btn-group">
        <a href="<?php echo site_url() ?>" class="btn btn-primary"><?php echo l('Back To Category') ?></a>
    </div>
    <div class="clearfix"></div>
</div>

<?php echo $this->listing_grid->show($films) ?>

<?php if (!$this->input->is_ajax_request()): ?>
    <div class="row-fluid grid-bottom">
        <div class="span6 left">
            <?php echo $this->pagination->per_page_changer() ?>
        </div>
        <div class="span6 right">
            <?php echo $this->pagination->create_links() ?>
        </div>
    </div>
<?php endif ?>
