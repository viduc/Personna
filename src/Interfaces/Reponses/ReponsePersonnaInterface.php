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
     * @param PersonnaModel[] $personnas
     * @return void
     */
    public function setPersonnas(array $personnas): void;

    /**
     * @return PersonnaModel[]
     */
    public function getPersonnas(): array;

    /**
     * @param PersonnaModel $personnaModel
     * @return void
     */
    public function addPersonna(PersonnaModel $personnaModel): void;
}