<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pricings'), ['controller' => 'Pricings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pricing'), ['controller' => 'Pricings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Register Date') ?></th>
            <td><?= h($event->last_register_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pricings') ?></h4>
        <?php if (!empty($event->pricings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->pricings as $pricings): ?>
            <tr>
                <td><?= h($pricings->id) ?></td>
                <td><?= h($pricings->event_id) ?></td>
                <td><?= h($pricings->price) ?></td>
                <td><?= h($pricings->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pricings', 'action' => 'view', $pricings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pricings', 'action' => 'edit', $pricings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pricings', 'action' => 'delete', $pricings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
