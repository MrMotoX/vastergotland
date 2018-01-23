<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $application->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pricings'), ['controller' => 'Pricings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pricing'), ['controller' => 'Pricings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events Fields'), ['controller' => 'EventsFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Events Field'), ['controller' => 'EventsFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applications form large-9 medium-8 columns content">
    <?= $this->Form->create($application) ?>
    <fieldset>
        <legend><?= __('Edit Application') ?></legend>
        <?php
            echo $this->Form->control('event_id', ['options' => $events]);
            echo $this->Form->control('pricing_id', ['options' => $pricings]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('ssn');
            echo $this->Form->control('email');
            echo $this->Form->control('date');
            echo $this->Form->control('price');
            echo $this->Form->control('fields._ids', ['options' => $fields]);
            echo $this->Form->control('events_fields._ids', ['options' => $eventsFields]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
