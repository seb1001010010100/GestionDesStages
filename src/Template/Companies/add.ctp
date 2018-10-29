<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="companies form large-9 medium-8 columns content">
    <?= $this->Form->create($company) ?>
    <fieldset>
        <legend><?= __('Add Company') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('adress');
            echo $this->Form->control('city');
            echo $this->Form->control('province');
            echo $this->Form->control('establishment_id', ['options' => $establishments]);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('phone');

            echo $this->Form->control('client_types._ids', array('type' => 'select', 'multiple' => 'checkbox')); // , 'options' => $clientTypes
            echo $this->Form->control('missions._ids', array('type' => 'select', 'multiple' => 'checkbox')); // , 'options' => $missions
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
