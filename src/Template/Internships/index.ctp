<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship[]|\Cake\Collection\CollectionInterface $internships
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internships index large-9 medium-8 columns content">
    <h3><?= __('Internships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ownerStatus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clientType_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('task') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precision_facility') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precision_task') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internships as $internship): ?>
            <tr>
                <td><?= $this->Number->format($internship->id) ?></td>
                <td><?= $internship->has('company') ? $this->Html->link($internship->company->name, ['controller' => 'Companies', 'action' => 'view', $internship->company->id]) : '' ?></td>
                <td><?= $internship->has('session') ? $this->Html->link($internship->session->id, ['controller' => 'Sessions', 'action' => 'view', $internship->session->id]) : '' ?></td>
                <td><?= $this->Number->format($internship->ownerStatus_id) ?></td>
                <td><?= $this->Number->format($internship->region_id) ?></td>
                <td><?= $this->Number->format($internship->clientType_id) ?></td>
                <td><?= h($internship->name) ?></td>
                <td><?= h($internship->task) ?></td>
                <td><?= h($internship->precision_facility) ?></td>
                <td><?= h($internship->precision_task) ?></td>
                <td><?= h($internship->adress) ?></td>
                <td><?= h($internship->city) ?></td>
                <td><?= h($internship->province) ?></td>
                <td><?= h($internship->postal_code) ?></td>
                <td><?= $this->Number->format($internship->phone) ?></td>
                <td><?= $this->Number->format($internship->fax) ?></td>
                <td><?= h($internship->email) ?></td>
                <td><?= h($internship->created) ?></td>
                <td><?= h($internship->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internship->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
