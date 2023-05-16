<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersBuy $customersBuy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customers Buy'), ['action' => 'edit', $customersBuy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customers Buy'), ['action' => 'delete', $customersBuy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersBuy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customers Buy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customersBuys view content">
            <h3><?= h($customersBuy->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $customersBuy->has('customer') ? $this->Html->link($customersBuy->customer->name, ['controller' => 'Customers', 'action' => 'view', $customersBuy->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Buy') ?></th>
                    <td><?= $customersBuy->has('buy') ? $this->Html->link($customersBuy->buy->id, ['controller' => 'Buys', 'action' => 'view', $customersBuy->buy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customersBuy->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
