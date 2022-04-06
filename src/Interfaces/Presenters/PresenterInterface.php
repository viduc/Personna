<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Presenters;

use Viduc\Personna\Interfaces\Reponses\ReponseInterface;

/**
 * @codeCoverageIgnore
 */
interface PresenterInterface
{
    /**
     * @param ReponseInterface $reponse
     * @return void
     */
    public function presente(ReponseInterface $reponse): void;

    /**
     * @codeCoverageIgnore
     * @return ReponseInterface
     */
    public function getReponse(): ReponseInterface;
}