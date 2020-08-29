<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Fefelov A.
 * Date: 29.08.2020
 * Time: 22:42
 */

namespace App\DBAL;


use Acelaya\Doctrine\Type\PhpEnumType;

class TransmissionEnumType extends PhpEnumType
{
    public const AUTO = 'auto';
    public const MANUAL = 'manual';

}