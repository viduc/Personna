<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\Reponses;

use viduc\personna\Interfaces\Reponses\ReponseInterface;
use viduc\personna\Model\PersonnaModel;

class ReponseCreate implements ReponseInterface
{
    private PersonnaModel $personna;

    final public function setPersonnaModel(PersonnaModel $personna): void
    {
        $this->personna = $personna;
    }

    final public function getPersonnaModel(): PersonnaModel
    {
        return $this->personna;
    }
}