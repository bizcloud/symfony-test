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

class FuelEnumType extends PhpEnumType
{
    public const GAS = 'gas';
    public const DIESEL = 'diesel';
    public const PETROL = 'petrol';
    public const ELECTRIC = 'electric';
    public const HYBRID = 'hybrid';

}