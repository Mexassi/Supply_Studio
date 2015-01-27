<nav class="dash-header">
  <a href="#" class="dash-logo-link" title="Company Settings">
    <img class="dash-logo" src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo">
    <svg class="dash-header-nav-icon icon-cog"><use xlink:href="#icon-cog"></use></svg>
  </a>
  <ul class="dash-header-nav">
    <li id="businessName" class="dash-header-nav-business-name">
      <div class="dropdown">
        <button id="dLabel" class="btn-dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= stripslashes($companyName);?>
          <span class="caret"></span>
        </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <?php foreach ($businesses as $business): ?>
              <?php if ($business->business_name != $companyName): ?>
                <li>
                  <form action="<?= base_url('switchBusiness') ?>" method="POST">
                    <button name="id" value="<?= $business->business_id ?>"><?= $business->business_name ?></button>
                  </form>
                </li>
              <?php endif ?>
            <?php endforeach ?>
            <li style="margin-top: 10px; border-top: thin solid #eee;"><a href='<?= base_url('new-business') ?>'>New Business...</a></li>
          </ul>
      </div>
    </li>
    <li><a href="<?= base_url('members') ?>">Dashboard</a></li>
    <li><a href="<?= base_url('orders') ?>">Orders</a></li>
    <li><a href="<?= base_url('suppliers') ?>">Suppliers</a></li>
    <li><a href="<?= base_url('products') ?>">Products</a></li>
  </ul>
  <ul class="dash-header-nav dash-header-nav--right">
    <li><a href="<?= base_url('logout') ?>" title="Logout"><svg class="dash-header-nav-icon icon-user"><use xlink:href="#icon-user"></use></svg></a></li>
    <li><a href="<?= base_url('settings') ?>" title="Settings"><svg class="dash-header-nav-icon icon-cog"><use xlink:href="#icon-cog"></use></svg></a></li>
  </ul>
</nav>
