<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersBuy $customersBuy
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $buys
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Customers Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customersBuys form content">
            <?= $this->Form->create($customersBuy) ?>
            <fieldset>
                <legend><?= __('Add Customers Buy') ?></legend>
                <?php
                    echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                    echo $this->Form->control('buy_id', ['options' => $buys, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
