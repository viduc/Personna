<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Controller;

use Viduc\Personna\Interfaces\Presenters\PresenterInterface;
use Viduc\Personna\Interfaces\Requetes\RequeteInterface;

interface UseCaseInterface
{
    public function execute(
        RequeteInterface $requete,
        PresenterInterface $presenter
    ): PresenterInterface;
}