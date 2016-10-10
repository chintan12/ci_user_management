<?php 
	include("header.php"); 
	include("navigation.php");
?>
<!-- Login form -->
<div class="container">
	<?php echo form_open("login/admin_login", array('class' => 'form-horizontal' )); ?>
  	<fieldset>
    <legend>Login Admin</legend>
    	
    	<?php if ($msg = $this->session->flashdata('login_failed')): ?>
	    	<div class="row">
				<div class="col-lg-2"></div>
		      	<div class="col-lg-5">
		      		<div class="<?php echo $this->session->flashdata('class') ?>">
		      			<?= $msg ?>
		      		</div>
		      	</div>
		    </div>
		<?php endif; ?>

	    <div class="form-group">
	      <label for="inputEmail" class="col-lg-2 control-label">Username :</label>
	      <div class="col-lg-5">
	      	<?php echo form_input(["name" => "uname", "id" => "inputuser", "placeholder" => "Username", "class" => "form-control", "value" => set_value('uname')]); ?>
	      </div>
	      <div class="col-lg-5">
	      	<?php echo form_error("uname", "<p class='text-danger'>", "</p>"); ?>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputPassword" class="col-lg-2 control-label">Password :</label>
	      <div class="col-lg-5">
	      	<?php echo form_password(["name" => "password", "id" => "inputPassword", "placeholder" => "Password", "class" => "form-control", "value" => ""]); ?>
	      </div>
	      <div class="col-lg-5">
	      	<?php echo form_error("password", "<p class='text-danger'>", "</p>"); ?>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-5 col-lg-offset-2">
	        <?php echo form_reset(["class" => "btn btn-default", "value" => "Reset"]); ?>
	        <?php echo form_submit(["class" => "btn btn-primary", "value" => "Submit"]); ?>
	      </div>
	    </div>
  	</fieldset>
  	<?php echo form_close(); ?>
  	<?php // echo validation_errors("uname"); ?>
</div>


<?php include("footer.php"); ?>