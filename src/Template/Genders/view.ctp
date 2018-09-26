<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gender'), ['action' => 'edit', $gender->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gender'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gender'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genders view large-9 medium-8 columns content">
    <h3><?= h($gender->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= h($gender->categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gender->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gender->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gender->modified) ?></td>
        </tr>
    </table>
</div>
