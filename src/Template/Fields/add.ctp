<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Field $field
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fields form large-9 medium-8 columns content">
    <?= $this->Form->create($field) ?>
    <fieldset>
        <legend><?= __('Add Field') ?></legend>
        <?php
            echo $this->Form->control('Fields.title');
            echo $this->Form->control('Fields.type', ['type' => 'select', 'options' => $types]);
            echo $this->Form->control('Fields.validation', ['type' => 'select', 'options' => $validations, 'empty' => true]);
            echo $this->Form->control('Fields.data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
