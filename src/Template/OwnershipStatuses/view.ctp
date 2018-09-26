<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OwnershipStatus $ownershipStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ownership Status'), ['action' => 'edit', $ownershipStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ownership Status'), ['action' => 'delete', $ownershipStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownershipStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ownership Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ownership Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ownershipStatuses view large-9 medium-8 columns content">
    <h3><?= h($ownershipStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($ownershipStatus->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ownershipStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ownershipStatus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ownershipStatus->modified) ?></td>
        </tr>
    </table>
</div>
