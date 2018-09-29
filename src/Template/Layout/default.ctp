<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
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
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title'); ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php
                if($this->Session->read('Auth')) {
                   // user is logged in, show logout..user menu etc
                   echo '<li>'.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')).'</li>';
                } else {
                   // the user is not logged in
                   echo '<li>'.$this->Html->link('Login', array('controller' => 'users', 'action' => 'login')).'</li>';
                   echo '<li>'.$this->Html->link('Inscription Étudiant', array('controller' => 'students', 'action' => 'add')).'</li>';
                }
                ?>
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?php
        if($this->Session->read('Auth')) {
            $role = $this->Session->read('Auth')['User']['role'];
            switch ($role) {
                case 'student':
                    echo $this->element('sidebar/student');
                    break;
                case 'administrator':
                    echo $this->element('sidebar/administrator');
                    break;
                case 'company':
                    echo $this->element('sidebar/company');
                    break;
            }
        }
        ?>
        

        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
