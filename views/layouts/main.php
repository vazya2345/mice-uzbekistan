<?php

/** @var \yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => 'MICE Uzbekistan — National Platform for Meetings, Incentives, Conferences and Events']);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?> | MICE Uzbekistan</title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- ============================================================
     NAVIGATION
     ============================================================ -->
<nav class="navbar navbar-expand-lg mice-nav" aria-label="Main navigation">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
            <span class="brand-logo" aria-hidden="true">🌿</span>
            <span>MICE<strong> Uzbekistan</strong></span>
        </a>

        <!-- Mobile toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#miceNav"
                aria-controls="miceNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="miceNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= Yii::$app->controller->id === 'site' && Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>"
                       href="<?= Yii::$app->homeUrl ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Venues</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= Yii::$app->controller->module->id === 'hotels' ? 'active' : '' ?>"
                               href="<?= \yii\helpers\Url::to(['/hotels/hotel/index']) ?>">🏨 Hotels</a></li>
                        <li><a class="dropdown-item" href="#">Conference Rooms</a></li>
                        <li><a class="dropdown-item" href="#">Convention Centers</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">All Venues</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Cities</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <?php if (Yii::$app->user->isGuest): ?>
                    <a class="nav-link" href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Sign In</a>
                    <a class="nav-link btn-nav-cta" href="<?= \yii\helpers\Url::to(['/site/signup']) ?>">List Your Venue</a>
                <?php else: ?>
                    <a class="nav-link btn-nav-cta" href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"
                       data-method="post">Logout (<?= Html::encode(Yii::$app->user->identity->username) ?>)</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- ============================================================
     PAGE CONTENT
     ============================================================ -->
<main class="flex-shrink-0" role="main">
    <?= $content ?>
</main>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="mice-footer mt-auto">
    <div class="container">
        <div class="row g-4">
            <!-- Brand col -->
            <div class="col-lg-3 col-md-6">
                <span class="footer-brand">🌿 MICE Uzbekistan</span>
                <p class="footer-tagline">
                    The national platform connecting event planners with the finest venues across Uzbekistan.
                </p>
                <div class="footer-social mt-3">
                    <a href="#" class="social-btn" aria-label="Telegram">✈</a>
                    <a href="#" class="social-btn" aria-label="Instagram">📸</a>
                    <a href="#" class="social-btn" aria-label="LinkedIn">💼</a>
                    <a href="#" class="social-btn" aria-label="Facebook">👍</a>
                </div>
            </div>

            <!-- Venues -->
            <div class="col-lg-2 col-md-6 col-6">
                <p class="footer-heading">Venues</p>
                <ul class="footer-links">
                    <li><a href="#">Hotels</a></li>
                    <li><a href="#">Conference Rooms</a></li>
                    <li><a href="#">Convention Centers</a></li>
                    <li><a href="#">Outdoor Spaces</a></li>
                    <li><a href="#">Unique Venues</a></li>
                </ul>
            </div>

            <!-- Cities -->
            <div class="col-lg-2 col-md-6 col-6">
                <p class="footer-heading">Cities</p>
                <ul class="footer-links">
                    <li><a href="#">Tashkent</a></li>
                    <li><a href="#">Samarkand</a></li>
                    <li><a href="#">Bukhara</a></li>
                    <li><a href="#">Namangan</a></li>
                    <li><a href="#">Andijan</a></li>
                </ul>
            </div>

            <!-- Platform -->
            <div class="col-lg-2 col-md-6 col-6">
                <p class="footer-heading">Platform</p>
                <ul class="footer-links">
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">List Your Venue</a></li>
                    <li><a href="#">Event Planners</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="col-lg-3 col-md-6 col-6">
                <p class="footer-heading">Contact</p>
                <ul class="footer-links">
                    <li><a href="mailto:info@miceuzbekistan.uz">info@miceuzbekistan.uz</a></li>
                    <li><a href="tel:+998712000000">+998 71 200-00-00</a></li>
                    <li><a href="#">Tashkent Business Centre</a></li>
                    <li class="mt-2"><a href="#">Help Centre</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <span>© <?= date('Y') ?> MICE Uzbekistan. All rights reserved.</span>
            <span>Built with ❤ for Uzbekistan's event industry.</span>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
