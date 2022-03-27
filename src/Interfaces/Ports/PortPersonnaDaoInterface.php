<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\Ports;

use Viduc\Personna\Model\PersonnaModel;

interface PortPersonnaDaoInterface
{
    public function create(array $ptions): PersonnaModel;

    public function read(int $id): PersonnaModel;

    public function update(PersonnaModel $personna): PersonnaModel;

    public function delete(PersonnaModel $personna): void;
}