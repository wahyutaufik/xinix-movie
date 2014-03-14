<script type="text/javascript">
    $(function() {
        function resize() {
            $('#login-pane').css({
                left: ($(window).width() - $('#login-pane').width()) / 2,
                top: (($(window).height() - $('#login-pane').height()) / 2) - 25
            });
        }

        $(window).resize(function() {
            resize();
        });
        resize();
    });
</script>

<div id="login-pane" class="login-pane<?php echo (is_error_exists()) ? " accessdenied" : '' ?>">
    <div>
        <form action="" method="post">
            <div class="login-form">

                <?php /* Put your logo here inside div.logo */ ?>
                <div class="logo">
                    <img src="<?php echo theme_url('/img/File-Movies-icon.png') ?>" width="50" height="">
                    <!-- <div class="title">Xinix<br /><strong>MOVIE</strong></div> -->
                </div>

                <div class="system-time">
                    <span class="xinix-date"></span> &#149; <span class="xinix-time"></span>
                </div>
                <?php if (!$CI->config->item('use_db')): ?>
                <div style="text-align: center; color: red; font-weight: bold">
                    Database not ready!
                </div>
                <?php endif ?>
                <div>
                    <input type="text" name="login" value=""  placeholder="<?php echo l('Username/Email') ?>" />
                </div>
                <div>
                    <input type="password" name="password" value="" placeholder="<?php echo l('Password') ?>" />
                </div>
                <div style="padding-top:10px">
                    <input type="hidden" name="continue" value="" />
                    <input type="submit" value="Login" />
                    <a href="<?php echo site_url('web/signup') ?>" class="btn"><?php echo l('Signup') ?></a>
                </div>
            </div>
        </form>
    </div>
</div>