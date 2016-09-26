<?php require_once("admin_header.php"); ?>
<?php require_once("admin_navigation.php"); ?>

<div class="container">
	<?php if ($msg = $this->session->flashdata('feedback')): ?>
	<div class="row" >
		<div class="col-lg-12">
			<div class="<?php echo $this->session->flashdata('class') ?>">
				<?= $msg; ?>	
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="row" >
		<div class="col-lg-5">
			<a href="<?= base_url("admin/article_form"); ?>" class="btn btn-primary">Add article</a>
		</div>
	</div>
	<div class="row" >
		<div class="col-lg-12">
			<?php if($data):?>
				<?php $count = $this->uri->segment(3, 0); ?>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th width="5%">#ID</th>
							<th width="75%">Title</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $value):?>
						<tr>
							<td><?= ++$count ?></td>
							<td><?= htmlentities($value->title) ?></td>
							<td>
								<div class="row">
									<div class="col-lg-6">
										<a href="<?= base_url("admin/edit_article/{$value->id}"); ?>" class="btn btn-primary">Edit</a> 
									</div>
									<div class="col-lg-6">
										<?= form_open("admin/delete_article", ["name" => "deleteform"]); ?>
										<?= form_hidden("id", $value->id); ?>
										<?= form_submit(["class" => "btn btn-danger", "value" => "Delete"]); ?>
										<?= form_close(); ?>		
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			<?php echo $this->pagination->create_links(); ?>
			<?php else:?>
				<div class="jumbotron">
				  <h1>No Record Found</h1>
				  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				</div>
			<?php endif;?> 
		</div>
	</div>
</div>

<?php require_once("admin_footer.php"); ?>