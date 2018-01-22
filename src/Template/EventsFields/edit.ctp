<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsField $eventsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventsField->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventsField->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Events Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsFields form large-9 medium-8 columns content">
    <?= $this->Form->create($eventsField) ?>
    <fieldset>
        <legend><?= __('Edit Events Field') ?></legend>
        <?php
            echo $this->Form->control('event_id', ['options' => $events]);
            echo $this->Form->control('field_id', ['options' => $fields]);
            echo $this->Form->control('title');
            echo $this->Form->control('type');
            echo $this->Form->control('validation');
            echo $this->Form->control('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
