<?php
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Coordonateur</li>
        <li><?= $this->Html->link(__('Mon profil'), ['controller' => 'users', 'action' => 'viewCurrentUser']) ?></li>
        <li><?= $this->Html->link(__('Liste des stages'), ['controller' => 'internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des milieux de stages'), ['controller' => 'companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des étudiants'), ['controller' => 'students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des étudiants qui n\'ont pas de stage'), ['controller' => 'students', 'action' => 'viewStudentNoInternship']) ?></li>     		

        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Créer un compte milieu de stage'), ['controller' => 'companies', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Ajouter un stage'), ['controller' => 'internships', 'action' => 'add']) ?></li>
    </ul>
</nav>
