<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Requetes;

use Viduc\Personna\Exceptions\PersonnaRequetesException;

interface RequeteInterface
{
    /**
     * @return string
     */
    public function getAction(): string;

    /**
     * @param string $param
     * @return mixed
     * @throws PersonnaRequetesException
     */
    public function getParam(string $param): mixed;
}