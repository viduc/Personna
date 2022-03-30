<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Repository;

use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Model\PersonnaModel;

class PersonnaRepository
{
    private FileInterface $file;

    public function __construct(FileInterface $file)
    {
        $this->file = $file;
    }

    /**
     * @param array $ptions
     * @return PersonnaModel
     */
    final public function create(array $ptions): PersonnaModel
    {
        $personna = new PersonnaModel($ptions);
        $personna->setId($this->generateId());
        return $this->file->create($personna);
    }

    /**
     * @return int
     */
    private function generateId(): int
    {
        $tabId = [];
        foreach ($this->getAll() as $personna) {
            $tabId[] = $personna->getId();
        }
        $id = 0;
        while (in_array($id, $tabId, true)) {
            $id++;
        }

        return $id;
    }

    final public function read(int $id): PersonnaModel
    {
        return new PersonnaModel();
    }

    final public function update(PersonnaModel $personna): PersonnaModel
    {
        return $personna;
    }

    final public function delete(PersonnaModel $personna): void
    {

    }

    final public function getAll(): array
    {
        return [];
    }

    /**
     * @codeCoverageIgnore
     * @param FileInterface $file
     * @return void
     */
    final public function setFile(FileInterface $file): void
    {
        $this->file = $file;
    }
}