<?php 
	include("header.php"); 
	include("navigation.php");
?>
<div class="container">
	<h1>All articles</h1>	
	<hr>
	<div class="row" >
		<div class="col-lg-12">
			<?php if($articles) :
				$count = $this->uri->segment(3, 0); ?>
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th width="5%">#ID</th>
						<th width="75%">Title</th>
						<th width="20%">Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($articles as $article):?>
					<tr>
						<td><?= ++$count ?></td>
						<td><?= anchor("user/find/{$article->id}", htmlentities($article->title)) ?></td>
						<td><?= htmlentities(date("M D y H:i:s", strtotime($article->created_at))) ?></td>
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
<?php include("footer.php"); ?>