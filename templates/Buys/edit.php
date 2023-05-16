<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buy $buy
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $buy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $buy->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buys form content">
            <?= $this->Form->create($buy) ?>
            <fieldset>
                <legend><?= __('Edit Buy') ?></legend>
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
