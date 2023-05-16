<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersBuy Entity
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $buy_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Buy $buy
 */
class CustomersBuy extends Entity
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
        'customer_id' => true,
        'buy_id' => true,
        'customer' => true,
        'buy' => true,
    ];
}
