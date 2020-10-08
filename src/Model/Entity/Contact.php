<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $apellido
 * @property string $email
 * @property string $asunto
 * @property string $Descripcion
 * @property \Cake\I18n\FrozenTime $created
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Contact extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'apellido' => true,
        'email' => true,
        'asunto' => true,
        'Descripcion' => true,
        'created' => true,
        'user_id' => true,
        'user' => true
    ];
}
