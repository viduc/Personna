<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace Viduc\Personna\File;

use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Model\PersonnaModel;

class File implements FileInterface
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    final public function create(PersonnaModel $personna): void
    {
        $file = $this->path. $personna->getUsername() . '.personna';
        if (!file_exists($file)) {
            try {
                file_put_contents(
                    $file,
                    json_encode($personna->jsonSerialize(), JSON_THROW_ON_ERROR)
                );// @codeCoverageIgnoreStart
            } catch (\JsonException $e) {
                throw new PersonnaFileException($e->getMessage(), 101);
            }// @codeCoverageIgnoreStop
        } else {
            throw new PersonnaFileException(
                'Le personna ' . $personna->getUsername() . ' existe  déjà',
                100
            );
        }
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