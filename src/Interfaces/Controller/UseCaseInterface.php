<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\Interfaces\Controller;

use viduc\personna\Interfaces\Presenters\PresenterInterface;
use viduc\personna\Interfaces\Requetes\RequeteInterface;

interface UseCaseInterface
{
    public function execute(
        RequeteInterface $requete,
        PresenterInterface $presenter
    ): PresenterInterface;
}