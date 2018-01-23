<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application[]|\Cake\Collection\CollectionInterface $applications
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Application'), ['action' => 'add']) ?></li>
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
<div class="applications index large-9 medium-8 columns content">
    <h3><?= __('Applications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pricing_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ssn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application): ?>
            <tr>
                <td><?= $this->Number->format($application->id) ?></td>
                <td><?= $application->has('event') ? $this->Html->link($application->event->title, ['controller' => 'Events', 'action' => 'view', $application->event->id]) : '' ?></td>
                <td><?= $application->has('pricing') ? $this->Html->link($application->pricing->id, ['controller' => 'Pricings', 'action' => 'view', $application->pricing->id]) : '' ?></td>
                <td><?= $application->has('user') ? $this->Html->link($application->user->id, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
                <td><?= h($application->ssn) ?></td>
                <td><?= h($application->email) ?></td>
                <td><?= h($application->date) ?></td>
                <td><?= $this->Number->format($application->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $application->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $application->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]) ?>
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
