<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buy $buy
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buys form content">
            <?= $this->Form->create($buy) ?>
            <fieldset>
                <legend><?= __('Add Buy') ?></legend>
                <?php
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('customer_id');
                    echo $this->Form->control('customers._ids', ['options' => $customers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
