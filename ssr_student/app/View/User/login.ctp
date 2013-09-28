<body style = "padding-top:40px">
        <div class="container">
            <div class="row">
                <div class="span6 offset3">
                    <h3>Login for Student</h3>
                    <div class="control-group well" style="text-align: center;">
                    	<div id="login">
		                    <?php if (isset($this->validationErrors['UserConfidential']['login'][0])): ?>
		                    <p class="mb10">
		                        <span class="red"><?php echo $this->validationErrors['UserConfidential']['login'][0]; ?></span>
		                    </p>
		                    <?php endif; ?>
		                    <?php echo $this->Form->create(); ?>
		                        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
		                        <div id="login_email_container">
		                            <label for="login_email">Email</label>
		                            <?php echo $this->Form->input('UserConfidential.email', array('id' => 'login_email', 'type' => 'text', 'div' => false, 'label' => false)); ?>
		                        </div><!-- login_email_container -->
		                         <div id="login_passwd_container">
		                            <label for="login_passwd">Password</label>
		                            <?php echo $this->Form->input('UserConfidential.password', array('id' => 'login_passwd', 'type' => 'password', 'div' => false, 'label' => false)); ?>
		                        </div><!-- login_passwd_container -->
                        		<input type="hidden" name="token" value="<?php echo session_id(); ?>">
		                        <div class="c">
		                            <input class="btn btn-primary" type="submit" value="Login">
		                        </div>
		                    <?php echo $this->Form->end(); ?>
		                </div><!--login-->
                    </div>
                </div>
            </div>
        </div>
</body>

