<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsField[]|\Cake\Collection\CollectionInterface $eventsFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsFields index large-9 medium-8 columns content">
    <h3><?= __('Events Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsFields as $eventsField): ?>
            <tr>
                <td><?= $this->Number->format($eventsField->id) ?></td>
                <td><?= $eventsField->has('event') ? $this->Html->link($eventsField->event->title, ['controller' => 'Events', 'action' => 'view', $eventsField->event->id]) : '' ?></td>
                <td><?= $eventsField->has('field') ? $this->Html->link($eventsField->field->title, ['controller' => 'Fields', 'action' => 'view', $eventsField->field->id]) : '' ?></td>
                <td><?= h($eventsField->title) ?></td>
                <td><?= h($eventsField->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsField->id)]) ?>
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
