<?php
$this->title = 'Welcome Section';
?>
<div class="content">
  <div class="row">

<div class="spacer-30"></div>

<?php $this->beginContent('@app/views/admin/welcome/welcomemenu.php', ['active' => 'titles', 'id' => $model->id]); ?>
<?php $this->endContent(); ?>

  <div class="spacer-30"></div>

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Welcome Texts</h3>
      </div>
      <?php $this->beginContent('@app/views/admin/welcome/_update.php', ['model' => $model, 'redirect' => 0, 'buttonText' => 'Update']); ?>
      <?php $this->endContent(); ?>
    </div>
  </div>
  </div>
</div>
