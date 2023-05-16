<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Buy $buy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Buy'), ['action' => 'edit', $buy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Buy'), ['action' => 'delete', $buy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Buys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Buy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buys view content">
            <h3><?= h($buy->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($buy->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Id') ?></th>
                    <td><?= $buy->customer_id === null ? '' : $this->Number->format($buy->customer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($buy->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Customers') ?></h4>
                <?php if (!empty($buy->customers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Credit Limit') ?></th>
                            <th><?= __('Credit Used') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($buy->customers as $customers) : ?>
                        <tr>
                            <td><?= h($customers->id) ?></td>
                            <td><?= h($customers->name) ?></td>
                            <td><?= h($customers->last_name) ?></td>
                            <td><?= h($customers->phone) ?></td>
                            <td><?= h($customers->credit_limit) ?></td>
                            <td><?= h($customers->credit_used) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
