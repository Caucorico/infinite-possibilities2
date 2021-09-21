<?php


namespace App\Service\Core;


use App\Entity\Core\CommonCoreElement;
use Doctrine\Common\Collections\Collection;

class CommonCoreElementService
{

    /**
     * Convert the given {@link CommonCoreElement} {@link Collection} into an array of the Ids and Names convertible in Json.
     *
     * Example of return :
     *
     * <code>
     *     [
     *         [ 'id' => 1, 'name' => 'iron' ],
     *         [ 'id' => 2, 'name' => 'wood' ]
     *     ]
     * </code>
     *
     * @param Collection $resources List of {@link CommonCoreElement} to convert.
     *
     * @return array The array of the {@link CommonCoreElement} ids and names convertible in json.
     */
    public function getMinimalJsonConvertibleCommonCoreElementList(Collection $resources): array
    {
        $resourcesExport = array();

        /** @var CommonCoreElement $resource */
        foreach ($resources as $resource ) {
            $resourcesExport[] = array(
                'id'   => $resource->getId(),
                'name' => $resource->getName()
            );
        }

        return $resourcesExport;
    }

}