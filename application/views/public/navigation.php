<!--	Navigation	-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">article 100</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?= form_open("user/search", ["class" => "navbar-form navbar-left", "role" => "search"]) ?>
        <div class="form-group">
          <input type="text" name="searchtext" class="form-control" placeholder="Search" value="<?php echo set_value('searchtext'); ?>">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
        <div class="form-group">
          <?php echo form_error("searchtext", "<p class='text-danger'>", "</p>"); ?>
        </div>
      <?= form_close() ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url("user/all_article_list") ?>">articles</a></li>
        <li><a href="<?= base_url("login") ?>">Login</a></li>
      </ul>
    </div>
  </div>
</nav>