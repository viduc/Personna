<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\File;

use Viduc\Personna\Model\PersonnaModel;

interface FileInterface
{
    public function create(PersonnaModel $personna): PersonnaModel;

    public function read(int $id): PersonnaModel;

    public function update(PersonnaModel $personna): void;

    public function delete(PersonnaModel $personna): void;
}