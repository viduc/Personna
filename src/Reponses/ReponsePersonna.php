<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Reponses;

use Viduc\Personna\Interfaces\Reponses\ReponsePersonnaInterface;
use Viduc\Personna\Model\PersonnaModel;

class ReponsePersonna extends Reponse implements ReponsePersonnaInterface
{
    /**
     * @var PersonnaModel
     */
    private PersonnaModel $personna;

    /**
     * @param PersonnaModel $personna
     * @return void
     */
    final public function setPersonnaModel(PersonnaModel $personna): void
    {
        $this->personna = $personna;
    }

    /**
     * @return PersonnaModel
     */
    final public function getPersonnaModel(): PersonnaModel
    {
        return $this->personna;
    }
}