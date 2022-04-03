<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Reponses;

use Viduc\Personna\Model\PersonnaModel;

/**
 * @codeCoverageIgnore
 */
interface ReponsePersonnaInterface
{
    /**
     * @param PersonnaModel $personna
     * @return void
     */
    public function setPersonnaModel(PersonnaModel $personna): void;

    /**
     * @return PersonnaModel
     */
    public function getPersonnaModel(): PersonnaModel;
}