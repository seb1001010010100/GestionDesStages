<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Milieu de stage</li>
        <li><?= $this->Html->link(__('Monn profil'), ['controller' => 'users', 'action' => 'viewCurrentUser']) ?></li>
        <li><?= $this->Html->link(__('Liste des satges'), ['controller' => 'internships', 'action' => 'index']) ?></li>

    </ul>
</nav>