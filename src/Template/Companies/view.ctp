<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="companies view large-9 medium-8 columns content">
    <!-- <?php debug($company); ?> -->
    <h3><?= h($company->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($company->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($company->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($company->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($company->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Establishment') ?></th>
            <td><?= h($company->establishment->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ClientTypes') ?></th>
            <td><?php 
                foreach ($company->client_types as $ct) {echo h($ct->type).'<br>';} 
            ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Missions') ?></th>
            <td><?php 
                foreach ($company->missions as $mission) {echo h($mission->name).'<br>';} 
            ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($company->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Internships') ?></h4>
        <?php if (!empty($company->internships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <!-- <th scope="col"><?= __('OwnerStatus Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('ClientType Id') ?></th> -->
                <th scope="col"><?= __('Name') ?></th>
                <!-- <th scope="col"><?= __('Task') ?></th>
                <th scope="col"><?= __('Precision Facility') ?></th>
                <th scope="col"><?= __('Precision Task') ?></th>
                <th scope="col"><?= __('Adress') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Province') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Fax') ?></th>
                <th scope="col"><?= __('Email') ?></th> -->
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->internships as $internships): ?>
            <tr>
                <td><?= h($internships->id) ?></td>
                <td><?= h($internships->company_id) ?></td>
                <td><?= h($internships->session_id) ?></td>
                <!-- <td><?= h($internships->ownerStatus_id) ?></td>
                <td><?= h($internships->region_id) ?></td>
                <td><?= h($internships->clientType_id) ?></td> -->
                <td><?= h($internships->name) ?></td>
                <!-- <td><?= h($internships->task) ?></td>
                <td><?= h($internships->precision_facility) ?></td>
                <td><?= h($internships->precision_task) ?></td>
                <td><?= h($internships->adress) ?></td>
                <td><?= h($internships->city) ?></td>
                <td><?= h($internships->province) ?></td>
                <td><?= h($internships->postal_code) ?></td>
                <td><?= h($internships->phone) ?></td>
                <td><?= h($internships->fax) ?></td>
                <td><?= h($internships->email) ?></td> -->
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
