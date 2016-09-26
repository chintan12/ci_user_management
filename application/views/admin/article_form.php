<?php require_once("admin_header.php"); ?>
<?php require_once("admin_navigation.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<?= form_open("admin/store_article", array('class' => 'form-horizontal', "name" => "articleform")); ?>
			<?= form_hidden("created_at", Date("Y-m-d H:i:s")) ?>
		  		<fieldset>
			    	<legend>Add article</legend>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Title</label>
				      	<div class="col-lg-5">
				      		<?= form_input(["name" => "title", "id" => "inputTitle", "placeholder" => "article Title", "class" => "form-control", "value" => htmlentities(set_value('title'))]) ?>
				      	</div>
				      	<div class="col-lg-6">
				      		<?= form_error("title", "<p class='text-danger'>", '</p>'); ?>
				      	</div>
				    </div>
			    	<div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Body</label>
				      	<div class="col-lg-5">
				      		<?= form_textarea(["name" => "body", "id" => "inputBody", "placeholder" => "article Body", "class" => "form-control", "value" => htmlentities(set_value('body'))]); ?>
				      	</div>
				      	<div class="col-lg-6">
				      		<?= form_error("body", "<p class='text-danger'>", '</p>'); ?>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label"></label>
				      	<div class="col-lg-5">
				        	<?= form_reset(["class" => "btn btn-default", "value" => "Cancle"]);  ?>
				        	<?= form_submit(["class" => "btn btn-primary", "value" => "Submit"]);  ?>
				        </div>
				    </div>
			  </fieldset>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php require_once("admin_footer.php"); ?>