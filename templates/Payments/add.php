<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Add Payment') ?></legend>
                <?php
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
