<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsEventsField[]|\Cake\Collection\CollectionInterface $applicationsEventsFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Applications Events Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events Fields'), ['controller' => 'EventsFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Events Field'), ['controller' => 'EventsFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicationsEventsFields index large-9 medium-8 columns content">
    <h3><?= __('Applications Events Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('events_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicationsEventsFields as $applicationsEventsField): ?>
            <tr>
                <td><?= $this->Number->format($applicationsEventsField->id) ?></td>
                <td><?= $applicationsEventsField->has('application') ? $this->Html->link($applicationsEventsField->application->id, ['controller' => 'Applications', 'action' => 'view', $applicationsEventsField->application->id]) : '' ?></td>
                <td><?= $applicationsEventsField->has('events_field') ? $this->Html->link($applicationsEventsField->events_field->title, ['controller' => 'EventsFields', 'action' => 'view', $applicationsEventsField->events_field->id]) : '' ?></td>
                <td><?= h($applicationsEventsField->title) ?></td>
                <td><?= h($applicationsEventsField->type) ?></td>
                <td><?= h($applicationsEventsField->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $applicationsEventsField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicationsEventsField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicationsEventsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsEventsField->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
