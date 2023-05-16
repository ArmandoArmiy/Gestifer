<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Buy Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property int|null $customer_id
 *
 * @property \App\Model\Entity\Customer[] $customers
 */
class Buy extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'date' => true,
        'customer_id' => true,
        'customers' => true,
    ];
}
