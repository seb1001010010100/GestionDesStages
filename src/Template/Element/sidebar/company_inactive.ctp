<?php
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Milieu de stage</li>
        <li><?= $this->Html->link(__('Mon profil'), ['controller' => 'users', 'action' => 'viewCurrentUser']) ?></li>
		
		<li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Activer mon compte'), ['controller' => 'companies', 'action' => 'edit', $this->Session->read('Auth.User.role_data.id')]) ?></li>

    </ul>
</nav>
