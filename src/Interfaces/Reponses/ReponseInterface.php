<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\src\Interfaces\Reponses;

use viduc\personna\src\Model\PersonnaModel;

interface ReponseInterface
{
    public function setPersonnaModel(PersonnaModel $personna): void;

    public function getPersonnaModel(): PersonnaModel;

}