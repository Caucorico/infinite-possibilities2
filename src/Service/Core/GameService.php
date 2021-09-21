<?php


namespace App\Service\Core;


use App\Entity\Core\Game;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\ArrayShape;

class GameService
{

    private EntityManagerInterface $em;

    private CommonCoreElementService $commonCoreElementService;

    public function __construct(EntityManagerInterface $em, CommonCoreElementService $commonCoreElementService)
    {
        $this->em = $em;
        $this->commonCoreElementService = $commonCoreElementService;
    }

    /**
     * Convert the given {@link Game} into an array convertible in json.
     * The created array is used to be converted into a json usable by an API. This json is expected to be use by a
     * front-end to display the {@link Game} infos.
     *
     * @param Game $game The {@link Game} to convert in an array convertible in json.
     *
     * @return array The converted {@link Game} array.
     */
    #[ArrayShape(
        [
            'id' => "int",
            'name' => "null",
            'resources' => "array",
            'logical-buildings' => "array",
            'logical-path-types' => "array"
        ]
    )]
    public function getSimpleJsonConvertibleRepresentation(Game $game): array
    {
        return array(
            'id' => $game->getId(),
            'name' => $game->getName(),
            'resources' => $this->commonCoreElementService->getMinimalJsonConvertibleCommonCoreElementList(
                $game->getRessources()
            ),
            'logical-buildings' => $this->commonCoreElementService->getMinimalJsonConvertibleCommonCoreElementList(
                $game->getLogicalBuildings()
            ),
            'logical-path-types' => $this->commonCoreElementService->getMinimalJsonConvertibleCommonCoreElementList(
                $game->getLogicalBuildings()
            )
        );
    }
}