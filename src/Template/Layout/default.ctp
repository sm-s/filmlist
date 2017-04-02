<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Filmlist';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php
    $session = $this->request->session();
    $isAdmin = $session->read('isAdmin');
    $isDataAdmin = $session->read('isDataAdmin');
    $isModerator = $session->read('isModerator');
    $isFilmReviewer = $session->read('isFilmReviewer');
    ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="top large-12 medium-6 columns">
            <li>
            <h1><?= __('F i l m l i s t') ?></h1>
            </li>
        </ul>    
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?= $this->fetch('title') ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul>
                <li><?= $this->Html->link(__('Films'), ['controller' => 'Films', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>  
                <?php if ($isAdmin || $isModerator) { ?>
                    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                <?php } ?>
                <?php if ($isAdmin) { ?>
                    <li><?= $this->Html->link(__('Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
                <?php } ?>   
            </ul>
            <ul class="right">
                <?php if (empty($session->read('username'))) { ?>
                    <li><?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'signup']) ?></li>
                    <li><?= $this->Html->link(__('Log in'), ['controller' => 'Users', 'action' => 'login']) ?></li>
                <?php } 
                else {
                    $username = $session->read('username');
                    $id = $this->request->session()->read('userid');?>
                    <li><?= $this->Html->link(__('View your profile'), ['controller' => 'Users', 'action' => 'view', $id ]) ?></li>
                    <li><?= $this->Html->link(__('Log out'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                    <?php } ?>     
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>