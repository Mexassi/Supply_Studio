<div class="container">
  <div class="col-md-7">
    <form action="" class="form-horizontal">
      <fieldset>
        <legend>Current Business Information</legend>
        <div class="form-group">
          <label class="col-md-3 control-label">Business Name</label>
          <div class="col-md-9"><input type="text" class="form-control" value="<?= $companyName ?>" /></div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Collaborators</label>
          <div class="col-md-9">
            <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>Henry</span></div>
            <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>Lou</span></div>
            <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>John</span></div>
            <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>Potato</span></div>
            <div class="col-md-4 text-primary"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>Lorem</span></div>
            <div class="col-md-4"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg><span>Ipsum</span></div>
            <a href="#" class="btn btn-default btn-sm">Add more</a>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Primary Holder</label>
          <div class="col-md-9">
            <i class="mdi-action-account-circle collaborator-icon"></i><span>Lorem</span> — <em>You</em>
            <a href="#" class="btn btn-default btn-sm">Switch ownership</a>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Personal Info</legend>
        <div class="form-group">
          <label class="col-md-3 control-label">Name</label>
          <div class="col-md-9"><input type="text" class="form-control" placeholder="Name" /></div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Email</label>
          <div class="col-md-9">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="loremipsum@ipsumdolor.com" disabled>
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
              <input type="password" class="form-control" placeholder="**************" disabled>
              <div class="input-group-btn">
                <a href="#" class="btn btn-default">Change</a>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="col-md-4 col-md-offset-1">
      <div class="well">
        <p class="text-center">Current plan: <br />
          <span class="h2">Free Plan</span>
        </p>

        <div class="btn btn-primary btn-block">Get Premium!</div>
        <p class="h6">With premium, you'll get more functionality</p>
      </div>
    </div>
  </div>
</div>
