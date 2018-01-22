<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsField $applicationsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Applications Field'), ['action' => 'edit', $applicationsField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Applications Field'), ['action' => 'delete', $applicationsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applications Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applications Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applicationsFields view large-9 medium-8 columns content">
    <h3><?= h($applicationsField->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $applicationsField->has('application') ? $this->Html->link($applicationsField->application->id, ['controller' => 'Applications', 'action' => 'view', $applicationsField->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field') ?></th>
            <td><?= $applicationsField->has('field') ? $this->Html->link($applicationsField->field->title, ['controller' => 'Fields', 'action' => 'view', $applicationsField->field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($applicationsField->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($applicationsField->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($applicationsField->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($applicationsField->id) ?></td>
        </tr>
    </table>
</div>
