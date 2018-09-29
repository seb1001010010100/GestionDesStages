<?php
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Étudiant</li>
        <li><?= $this->Html->link(__('Liste des satges'), ['controller' => 'internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des milieu des stages'), ['controller' => 'companies', 'action' => 'index']) ?></li>

    </ul>
</nav>