<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pricing $pricing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pricing'), ['action' => 'edit', $pricing->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pricing'), ['action' => 'delete', $pricing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricing->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pricings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pricing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pricings view large-9 medium-8 columns content">
    <h3><?= h($pricing->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $pricing->has('event') ? $this->Html->link($pricing->event->title, ['controller' => 'Events', 'action' => 'view', $pricing->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pricing->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($pricing->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($pricing->date) ?></td>
        </tr>
    </table>
</div>
