<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Application'), ['action' => 'edit', $application->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Application'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pricings'), ['controller' => 'Pricings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pricing'), ['controller' => 'Pricings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events Fields'), ['controller' => 'EventsFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Field'), ['controller' => 'EventsFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applications view large-9 medium-8 columns content">
    <h3><?= h($application->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $application->has('event') ? $this->Html->link($application->event->title, ['controller' => 'Events', 'action' => 'view', $application->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pricing') ?></th>
            <td><?= $application->has('pricing') ? $this->Html->link($application->pricing->id, ['controller' => 'Pricings', 'action' => 'view', $application->pricing->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $application->has('user') ? $this->Html->link($application->user->id, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ssn') ?></th>
            <td><?= h($application->ssn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($application->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($application->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($application->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($application->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fields') ?></h4>
        <?php if (!empty($application->fields)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Validation') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->fields as $fields): ?>
            <tr>
                <td><?= h($fields->id) ?></td>
                <td><?= h($fields->title) ?></td>
                <td><?= h($fields->type) ?></td>
                <td><?= h($fields->validation) ?></td>
                <td><?= h($fields->data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fields', 'action' => 'view', $fields->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fields', 'action' => 'edit', $fields->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fields', 'action' => 'delete', $fields->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fields->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events Fields') ?></h4>
        <?php if (!empty($application->events_fields)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Validation') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($application->events_fields as $eventsFields): ?>
            <tr>
                <td><?= h($eventsFields->id) ?></td>
                <td><?= h($eventsFields->event_id) ?></td>
                <td><?= h($eventsFields->title) ?></td>
                <td><?= h($eventsFields->type) ?></td>
                <td><?= h($eventsFields->validation) ?></td>
                <td><?= h($eventsFields->data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventsFields', 'action' => 'view', $eventsFields->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventsFields', 'action' => 'edit', $eventsFields->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventsFields', 'action' => 'delete', $eventsFields->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsFields->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
