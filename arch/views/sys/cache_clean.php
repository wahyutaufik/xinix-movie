<meta http-equiv="refresh" content="3;url=<?php echo $_SERVER['HTTP_REFERER'] ?>" />
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content">
                    <fieldset>
                        <legend><?php echo l('System') ?></legend>
                        <p><?php echo l('Cache cleaned!') ?></p>
                        <p><?php echo l('This page will be redirected back to referer soon...') ?></p>
                    </fieldset>
                    <div class="form-actions">    
                        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-danger"><i class="icons-hand-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>