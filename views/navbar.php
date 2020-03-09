<?php
$pages = array();
$pages["index.php"] = "Home";
$pages["cars.php"] = "Cars";
$pages["about-us.php"] = "About us";
$pages["contact-us.php"] = "Contact us";
$pages["admin/admin.php"] = "Admin";

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$active = false;
require(dirname(__DIR__)."\controllers\Utils.php");

?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
  <h5 class="my-0 mr-md-auto font-weight-normal">Rent A Car Co.,Ltd.</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <?php foreach ($pages as $url => $title) { ?>
      <?php $url === $curPageName ? $active = true : $active = false ?>
      <a class="p-2 text-dark " href="<?= SCRIPT_ROOT."/".$url?>"><?=$title?></a>

    <?php } ?>
  </nav>
  <a class="btn btn-outline-primary" href="#">Sign in</a>
  &nbsp;
  <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>