<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="internships form large-9 medium-8 columns content">
    <?= $this->Form->create($internship) ?>
    <fieldset>
        <legend><?= __('Edit Internship') ?></legend>
        <?php
             echo $this->Form->control('company_id', ['options' => $companies]);
            echo $this->Form->control('session_id', ['options' => $sessions]);
            echo $this->Form->control('ownerStatus_id', ['options' => $ownershipStatuses]);
            echo $this->Form->control('region_id', ['options' => $regions, 'default' => $internship->region->name]);
            
            echo $this->Form->control('name');
			
            echo $this->Form->control('task', ['type' => 'textarea', 'escape' => false]);
            echo $this->Form->control('precision_facility', ['type' => 'textarea', 'escape' => false]);
            echo $this->Form->control('precision_task', ['type' => 'textarea', 'escape' => false]);
			
            echo $this->Form->control('adress');
            echo $this->Form->control('city');
            echo $this->Form->control('province');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('phone');
            echo $this->Form->control('fax');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
