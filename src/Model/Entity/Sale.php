<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $motor_name
 * @property string $price
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Sale extends Entity
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
        'motor_name' => true,
        'price' => true,
        'date' => true,
        'customer' => true,
    ];
}
