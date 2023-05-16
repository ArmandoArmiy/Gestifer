<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Buy> $buys
 */
?>
<div class="buys index content">
    <?= $this->Html->link(__('New Buy'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Buys') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buys as $buy): ?>
                <tr>
                    <td><?= $this->Number->format($buy->id) ?></td>
                    <td><?= h($buy->date) ?></td>
                    <td><?= $buy->customer_id === null ? '' : $this->Number->format($buy->customer_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $buy->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buy->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buy->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
