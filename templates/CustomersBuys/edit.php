<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersBuy $customersBuy
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 * @var string[]|\Cake\Collection\CollectionInterface $buys
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customersBuy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customersBuy->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Customers Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customersBuys form content">
            <?= $this->Form->create($customersBuy) ?>
            <fieldset>
                <legend><?= __('Edit Customers Buy') ?></legend>
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
