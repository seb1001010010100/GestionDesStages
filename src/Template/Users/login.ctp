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
        <legend><?= __('Veuillez entrez votre email et votre mot de passe') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
<?php
echo $this->Html->link(
    'Créer un compte',
    ['controller' => 'Students', 'action' => 'add', '_full' => true]
);
?>
</div>