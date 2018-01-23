<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsField $eventsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Field'), ['action' => 'edit', $eventsField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Field'), ['action' => 'delete', $eventsField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsFields view large-9 medium-8 columns content">
    <h3><?= h($eventsField->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventsField->has('event') ? $this->Html->link($eventsField->event->title, ['controller' => 'Events', 'action' => 'view', $eventsField->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($eventsField->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($eventsField->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventsField->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Validation') ?></h4>
        <?= $this->Text->autoParagraph(h($eventsField->validation)); ?>
    </div>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($eventsField->data)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Applications') ?></h4>
        <?php if (!empty($eventsField->applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Pricing Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Ssn') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventsField->applications as $applications): ?>
            <tr>
                <td><?= h($applications->id) ?></td>
                <td><?= h($applications->event_id) ?></td>
                <td><?= h($applications->pricing_id) ?></td>
                <td><?= h($applications->user_id) ?></td>
                <td><?= h($applications->ssn) ?></td>
                <td><?= h($applications->email) ?></td>
                <td><?= h($applications->date) ?></td>
                <td><?= h($applications->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
