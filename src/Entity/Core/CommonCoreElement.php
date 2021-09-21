<?php


namespace App\Entity\Core;

/**
 * Interface CommonCoreElement.
 * This interface is used to distinct special entities that have an id and a name.
 * This entities are often a type of an entity like the resource-type (iron, wood etc.)
 * or unit-type (infantry, tanks etc.) and others...
 *
 * @package App\Entity\Core
 */
interface CommonCoreElement
{

    function getId(): ?int;
    function getName(): ?string;

}