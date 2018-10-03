<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Milieu de stage</li>
        <li><?= $this->Html->link(__('Mon profil'), ['controller' => 'users', 'action' => 'viewCurrentUser']) ?></li>
        <li><?= $this->Html->link(__('Liste des stages'), ['controller' => 'internships', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('Ajouter un stage'), ['controller' => 'internships', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Ajouter un stage'), ['controller' => 'internships', 'action' => 'add']) ?></li>

    </ul>
</nav>
