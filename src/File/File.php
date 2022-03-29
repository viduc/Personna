<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace Viduc\Personna\File;

use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Model\PersonnaModel;

class File implements FileInterface
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function create(PersonnaModel $personna): PersonnaModel
    {
        return new PersonnaModel();
    }

    public function read(int $id): PersonnaModel
    {
        return new PersonnaModel();
    }

    public function update(PersonnaModel $personna): void
    {

    }

    public function delete(PersonnaModel $personna): void
    {

    }
}