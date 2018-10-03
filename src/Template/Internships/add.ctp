<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="internships form large-9 medium-8 columns content">
    <?= $this->Form->create($internship) ?>
    <fieldset>
        <legend><?= __('Add Internship') ?></legend>
        <?php
            switch ($this->Session->read('Auth')['User']['role']) {
                case 'administrator':
                    echo $this->Form->control('company_id', ['options' => $companies]);
                    break;
                case 'company':
                    echo $this->Form->control('company_id', ['type' => 'hidden', 'value' => $this->Session->read('Auth')['User']['role_data']['id']]);
                    break;
            }
            echo $this->Form->control('session_id', ['options' => $sessions]);
            echo $this->Form->control('ownerStatus_id', ['options' => $ownershipStatuses]);
            echo $this->Form->control('region_id', ['options' => $regions]);
			
			echo $this->Form->control('clientType_id', array('type' => 'select', 'multiple'
				=> 'checkbox', 'options' => $clientTypes));
			
			echo $this->Form->control('missions_id', array('type' => 'select', 'multiple'
				=> 'checkbox', 'options' => $missions));

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
