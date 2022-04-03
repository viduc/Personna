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

class Reponse implements ReponseInterface
{
    /**
     * @var ErreurModel
     */
    private ErreurModel $erreur;

    /**
     * @param ErreurModel $erreur
     * @return void
     */
    final public function setErreur(ErreurModel $erreur): void
    {
        $this->erreur = $erreur;
    }

    /**
     * @return ErreurModel
     */
    final public function getErreur(): ErreurModel
    {
        return $this->erreur;
    }
}