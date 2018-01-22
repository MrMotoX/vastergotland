<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsField[]|\Cake\Collection\CollectionInterface $applicationsFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Applications Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicationsFields index large-9 medium-8 columns content">
    <h3><?= __('Applications Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicationsFields as $applicationsField): ?>
            <tr>
                <td><?= $this->Number->format($applicationsField->id) ?></td>
                <td><?= $applicationsField->has('application') ? $this->Html->link($applicationsField->application->id, ['controller' => 'Applications', 'action' => 'view', $applicationsField->application->id]) : '' ?></td>
                <td><?= $applicationsField->has('field') ? $this->Html->link($applicationsField->field->title, ['controller' => 'Fields', 'action' => 'view', $applicationsField->field->id]) : '' ?></td>
                <td><?= h($applicationsField->title) ?></td>
                <td><?= h($applicationsField->type) ?></td>
                <td><?= h($applicationsField->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $applicationsField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicationsField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicationsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsField->id)]) ?>
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
