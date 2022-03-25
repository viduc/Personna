<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\src\Repository;

use viduc\personna\src\Model\PersonnaModel;

class PersonnaRepository
{
    public function __construct()
    {

    }

    final public function create(array $ptions): PersonnaModel
    {
        return new PersonnaModel();
    }
}