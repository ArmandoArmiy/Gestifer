<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $phone
 * @property float|null $credit_limit
 * @property float|null $credit_used
 *
 * @property \App\Model\Entity\Buy[] $buys
 * @property \App\Model\Entity\Payment[] $payments
 */
class Customer extends Entity
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
        'name' => true,
        'last_name' => true,
        'phone' => true,
        'credit_limit' => true,
        'credit_used' => true,
        'buys' => true,
        'payments' => true,
    ];
}
