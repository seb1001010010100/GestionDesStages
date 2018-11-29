<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
    	<h2>Login</h2>
        <legend><?= __('Veuillez entrez votre email') ?></legend>
        <?= $this->Form->input('email') ?>
    </fieldset>
<?= $this->Form->button(__('Envoie email')); ?>
<?= $this->Form->end() ?>
</div>