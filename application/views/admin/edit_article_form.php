<?php require_once("admin_header.php"); ?>
<?php require_once("admin_navigation.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<?= form_open_multipart("admin/update_article/{$article->id}", array('class' => 'form-horizontal', "name" => "articleform")); ?>
		  		<fieldset>
			    	<legend>Edit article</legend>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Title</label>
				      	<div class="col-lg-5">
				      		<?= form_input(["name" => "title", "id" => "inputTitle", "placeholder" => "article Title", "class" => "form-control", "value" => $article->title]) ?>
				      	</div>
				      	<div class="col-lg-6">
				      		<?= form_error("title", "<p class='text-danger'>", '</p>'); ?>
				      	</div>
				    </div>
			    	<div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Body</label>
				      	<div class="col-lg-5">
				      		<?= form_textarea(["name" => "body", "id" => "inputBody", "placeholder" => "article Body", "class" => "form-control", "value" => $article->body]); ?>
				      	</div>
				      	<div class="col-lg-6">
				      		<?= form_error("body", "<p class='text-danger'>", '</p>'); ?>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Current Image</label>
				      	<div class="col-lg-5">
				      		<?php 
				      			$image_properties = array(
							        'src'   => $article->image_path,
							        'alt'   => $article->image_path,
							        'width' => '200',
							        'height'=> '200',
							        'rel'   => 'lightbox'
								);
				      			echo img($image_properties); 
				      			$old_image = array(
							        'old_image'   => $article->image_path
								);
				      			echo form_hidden($old_image);
			      			?>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label">Image</label>
				      	<div class="col-lg-5">
				      		<?= form_upload(["name" => "image", "id" => "inputImage", "placeholder" => "article Image", "class" => "form-control"]); ?>
				      	</div>
				      	<div class="col-lg-6">
				      		<?php if(isset($upload_error)){	echo $upload_error;	} ?>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-1 control-label"></label>
				      	<div class="col-lg-5">
				        	<?= form_reset(["class" => "btn btn-default", "value" => "Cancle"]);  ?>
				        	<?= form_submit(["class" => "btn btn-primary", "value" => "Update"]);  ?>
				        </div>
				    </div>
			  </fieldset>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php require_once("admin_footer.php"); ?>