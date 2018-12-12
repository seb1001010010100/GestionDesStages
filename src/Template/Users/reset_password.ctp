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
    	<h2>Changer mot de passe</h2>
        <legend><?= __('Veuillez entrez votre nouveau mot de passe') ?></legend>
        <?= $this->Form->input('Nouveau mot de passe', ['name' => 'pw1', 'type' => 'password', 'required' => true, 'autofocus' => true]) ?>
        <?= $this->Form->input('Retaper votre mot de passe', ['name' => 'pw2', 'type' => 'password', 'required' => true]) ?>
    </fieldset>
<?= $this->Form->button(__('Changer mot de passe')); ?>
<?= $this->Form->end() ?>
</div>