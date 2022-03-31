<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Reponses;

use Viduc\Personna\Model\ErreurModel;
use Viduc\Personna\Model\PersonnaModel;

interface ReponseInterface
{
    public function setPersonnaModel(PersonnaModel $personna): void;

    public function getPersonnaModel(): PersonnaModel;

    public function setErreur(ErreurModel $erreur): void;

    public function getErreurModel(): ErreurModel;

}