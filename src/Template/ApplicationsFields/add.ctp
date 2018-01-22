<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationsField $applicationsField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Applications Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['controller' => 'Fields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Field'), ['controller' => 'Fields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicationsFields form large-9 medium-8 columns content">
    <?= $this->Form->create($applicationsField) ?>
    <fieldset>
        <legend><?= __('Add Applications Field') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('field_id', ['options' => $fields]);
            echo $this->Form->control('title');
            echo $this->Form->control('type');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
