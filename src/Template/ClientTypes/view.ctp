<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientType $clientType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client Type'), ['action' => 'edit', $clientType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client Type'), ['action' => 'delete', $clientType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Client Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientTypes view large-9 medium-8 columns content">
    <h3><?= h($clientType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($clientType->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clientType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clientType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($clientType->modified) ?></td>
        </tr>
    </table>
</div>
