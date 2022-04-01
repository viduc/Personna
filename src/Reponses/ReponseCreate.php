<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Reponses;

use Viduc\Personna\Interfaces\Reponses\ReponseInterface;
use Viduc\Personna\Model\ErreurModel;
use Viduc\Personna\Model\PersonnaModel;

class ReponseCreate implements ReponseInterface
{
    private PersonnaModel $personna;
    private ErreurModel $erreur;

    final public function setPersonnaModel(PersonnaModel $personna): void
    {
        $this->personna = $personna;
    }

    final public function getPersonnaModel(): PersonnaModel
    {
        return $this->personna;
    }

    final public function setErreur(ErreurModel $erreur): void
    {
        $this->erreur = $erreur;
    }

    final public function getErreur(): ErreurModel
    {
        return $this->erreur;
    }
}