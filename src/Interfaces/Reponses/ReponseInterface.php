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

/**
 * @codeCoverageIgnore
 */
interface ReponseInterface
{
    /**
     * @param ErreurModel $erreur
     * @return void
     */
    public function setErreur(ErreurModel $erreur): void;

    /**
     * @return ErreurModel
     */
    public function getErreur(): ErreurModel;
}