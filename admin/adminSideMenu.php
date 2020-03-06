<?php
$adminPages = array();
$adminPages["admin.php"] = "Cars";
$adminPages["requests.php"] = "Rental Requests";
$adminPages["rentals.php"] = "Rentals";
$adminPages["users.php"] = "Users";
$adminPages["reports.php"] = "Reports";

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

$active = false;
?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <div class="pl-3">
            <h2>Admin Panel</h2>
        </div>
        <ul class="nav flex-column">
            <?php foreach ($adminPages as $url => $title) { ?>
                <?php $url === $curPageName ? $active = true : $active = false ?>
                <li class="nav-item">
                    <a class="nav-link <?= $active ? "active" : "" ?>" href="./<?= $url ?>">
                        <span data-feather="cars"></span>
                        <?= $title ?> <?= $active ? '<span class="sr-only">(current)</span>' : "" ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>