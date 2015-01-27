<div class="container">
  <div class="col-md-7">
    <form action="" class="form-horizontal">
      <fieldset>
        <legend>Current Business Information</legend>
        <div class="form-group">
          <label class="col-md-3 control-label">Business Name</label>
          <div class="col-md-9"><input type="text" class="form-control" value="<?= $companyName ?>" <?= ($admin == $username) ? "" : "disabled" ?> /></div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Colleagues</label>
          <div class="col-md-9">
            <?php foreach ($coworkers as $coworker): ?>
              <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span><?= $coworker ?></span></div>
            <?php endforeach ?>
            <div class="clearfix"></div>
            <?php if ($admin == $username): ?>
              <a href="#" class="btn btn-default btn-sm">Add more</a>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Primary Holder</label>
          <div class="col-md-9">
            <i class="mdi-action-account-circle collaborator-icon"></i>
            <span><?= $admin ?: "" ?></span>
            <?php if ($admin == $username): ?>
            — <em>You</em>
            <a href="#" class="btn btn-default btn-sm">Switch ownership</a>
            <?php endif ?>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Personal Info</legend>
        <div class="form-group">
          <label class="col-md-3 control-label">Email</label>
          <div class="col-md-9">
            <div class="input-group">
              <input type="text" class="form-control" value="<?= $email ?>" disabled>
              <div class="input-group-btn">
                <a href="#" class="btn btn-default">Change</a>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-md-3 control-label">Password</label>
          <div class="col-md-9">
            <div class="input-group">
              <input type="password" class="form-control" value="*******************" disabled>
              <div class="input-group-btn">
                <a href="#" class="btn btn-default">Change</a>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <?php if ($admin == $username): ?>
      <div class="col-md-4 col-md-offset-1">
        <div class="well">
          <p class="text-center">Current plan: <br />
            <span class="h2"><?= ucfirst($plan) ?> Plan</span>
          </p>
          <?php if ($plan == 'free'): ?>
            <div class="btn btn-primary btn-block">Get Premium!</div>
            <p class="h6">With premium, you'll get more functionality.</p>
          <?php else: ?>
            <div class="btn btn-primary btn-block">Upgrade!</div>
            <p class="h6">A better plan gives you more flexibility for a bigger company.</p>
          <?php endif ?>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
