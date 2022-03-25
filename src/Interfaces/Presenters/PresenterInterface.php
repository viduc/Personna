<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\src\Interfaces\Presenters;

use viduc\personna\src\Interfaces\Reponses\ReponseInterface;

interface PresenterInterface
{
    public function presente(ReponseInterface $reponse): void;
}