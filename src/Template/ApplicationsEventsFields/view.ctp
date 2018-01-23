<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsEventsField $applicationsEventsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Applications Events Field'), ['action' => 'edit', $applicationsEventsField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Applications Events Field'), ['action' => 'delete', $applicationsEventsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsEventsField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applications Events Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applications Events Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events Fields'), ['controller' => 'EventsFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Field'), ['controller' => 'EventsFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applicationsEventsFields view large-9 medium-8 columns content">
    <h3><?= h($applicationsEventsField->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $applicationsEventsField->has('application') ? $this->Html->link($applicationsEventsField->application->id, ['controller' => 'Applications', 'action' => 'view', $applicationsEventsField->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Events Field') ?></th>
            <td><?= $applicationsEventsField->has('events_field') ? $this->Html->link($applicationsEventsField->events_field->title, ['controller' => 'EventsFields', 'action' => 'view', $applicationsEventsField->events_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($applicationsEventsField->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($applicationsEventsField->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($applicationsEventsField->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($applicationsEventsField->id) ?></td>
        </tr>
    </table>
</div>
