<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HomeContent Entity
 *
 * @property int $id
 * @property string|null $logo
 * @property string $section1_title
 * @property string $section1_content
 * @property string|null $section1_img
 * @property string $section2_content
 * @property string $section2_title
 * @property string|null $section2_img
 * @property string $section3_title
 * @property string $section3_content
 * @property string|null $section3_img
 * @property string $section4_title
 * @property string $section4_content
 * @property string|null $section4_img
 */
class HomeContent extends Entity
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
        'logo' => true,
        'section1_title' => true,
        'section1_content' => true,
        'section1_img' => true,
        'section2_content' => true,
        'section2_title' => true,
        'section2_img' => true,
        'section3_title' => true,
        'section3_content' => true,
        'section3_img' => true,
        'section4_title' => true,
        'section4_content' => true,
        'section4_img' => true,
    ];
}
