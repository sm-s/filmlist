<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property int $film_id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property int $rating
 * @property \Cake\I18n\Time $created_at
 * @property bool $is_public
 *
 * @property \App\Model\Entity\Film $film
 * @property \App\Model\Entity\User $user
 */
class Review extends Entity
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
        '*' => true,
        'id' => false
    ];
}