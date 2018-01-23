<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsEventsField $applicationsEventsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Applications Events Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events Fields'), ['controller' => 'EventsFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Events Field'), ['controller' => 'EventsFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicationsEventsFields form large-9 medium-8 columns content">
    <?= $this->Form->create($applicationsEventsField) ?>
    <fieldset>
        <legend><?= __('Add Applications Events Field') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('events_field_id', ['options' => $eventsFields]);
            echo $this->Form->control('title');
            echo $this->Form->control('type');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
