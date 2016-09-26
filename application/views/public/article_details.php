<?php include_once("header.php") ?>
<?php include_once("navigation.php") ?>
<div class="container">
	<h1>
		<?= htmlentities($article->title)  ?>
	</h1>
	<hr>
	<p><?= htmlentities($article->body)  ?></p>	
</div>


<?php include_once("footer.php") ?>