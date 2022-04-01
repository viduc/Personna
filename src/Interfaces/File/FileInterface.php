<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\File;

use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\Model\PersonnaModel;

interface FileInterface
{
    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    public function create(PersonnaModel $personna): void;

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    public function update(PersonnaModel $personna): void;

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    public function delete(PersonnaModel $personna): void;

    /**
     * @return PersonnaModel[]
     * @throws PersonnaFileException
     */
    public function getAll(): array;
}