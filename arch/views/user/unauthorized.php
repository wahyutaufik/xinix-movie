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

<div id="login-pane" class="login-pane">
    <div>
        <form action="" method="post">
            <div class="login-form">

                <div class="logo">
                    <div class="title"><strong>Xinix-Movie</strong></div>
                </div>

                <div class="system-time">
                    <span class="xinix-date"></span> &#149; <span class="xinix-time"></span>
                </div>
                <div style="text-align: center">
                    <?php if (!empty($_GET['msg'])): ?>
                    <p>
                        <span style="color:blue">
                            System tell you that the error is:
                        </span>
                        <br/>
                        <?php echo $_GET['msg']?>
                    </p>
                    <?php endif ?>
                </div>
                <div style="text-align: center">
                	<p>
	                    <a href="<?php echo $CI->auth->login_page() ?>" class="btn"><?php echo l('Login') ?></a>
						<a href="<?php echo site_url('web/signup') ?>" class="btn"><?php echo l('Signup') ?></a>
                	</p>
                </div>
            </div>
        </form>
    </div>
</div>
