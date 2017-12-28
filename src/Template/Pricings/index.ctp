<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pricing[]|\Cake\Collection\CollectionInterface $pricings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pricing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pricings index large-9 medium-8 columns content">
    <h3><?= __('Pricings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pricings as $pricing): ?>
            <tr>
                <td><?= $this->Number->format($pricing->id) ?></td>
                <td><?= $pricing->has('event') ? $this->Html->link($pricing->event->title, ['controller' => 'Events', 'action' => 'view', $pricing->event->id]) : '' ?></td>
                <td><?= $this->Number->format($pricing->price) ?></td>
                <td><?= h($pricing->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pricing->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pricing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pricing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricing->id)]) ?>
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
