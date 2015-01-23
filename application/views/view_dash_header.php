<nav class="dash-header">
  <a href="#" class="dash-logo-link" title="Company Settings">
    <img class="dash-logo" src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo">
    <svg class="dash-header-nav-icon icon-cog"><use xlink:href="#icon-cog"></use></svg>
  </a>
  <ul class="dash-header-nav">
    <li id="businessName" class="dash-header-nav-business-name"><?= stripslashes($companyName);?></li>
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
