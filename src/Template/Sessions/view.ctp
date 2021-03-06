<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($session->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Season') ?></th>
            <td><?= h($session->season) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($session->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($session->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $session->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Internships') ?></h4>
        <?php if (!empty($session->internships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Adress') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Province') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Administrative Region') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->internships as $internships): ?>
            <tr>
                <td><?= h($internships->id) ?></td>
                <td><?= h($internships->company_id) ?></td>
                <td><?= h($internships->session_id) ?></td>
                <td><?= h($internships->name) ?></td>
                <td><?= h($internships->adress) ?></td>
                <td><?= h($internships->city) ?></td>
                <td><?= h($internships->province) ?></td>
                <td><?= h($internships->postal_code) ?></td>
                <td><?= h($internships->administrative_region) ?></td>
                <td><?= h($internships->created) ?></td>
                <td><?= h($internships->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Internships', 'action' => 'view', $internships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Internships', 'action' => 'edit', $internships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Internships', 'action' => 'delete', $internships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
