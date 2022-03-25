<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\src\Interfaces\Controller;

use viduc\personna\src\Interfaces\Presenters\PresenterInterface;
use viduc\personna\src\Interfaces\Requetes\RequeteInterface;

interface UseCaseInterface
{
    public function execute(
        RequeteInterface $requete,
        PresenterInterface $presenter
    ): PresenterInterface;
}