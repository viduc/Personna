<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Repository;

use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\Exceptions\PersonnaRepositoryException;
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
     * @param PersonnaModel|null $personna
     * @param array $options
     * @return PersonnaModel
     * @throws PersonnaRepositoryException
     */
    public function create(
        PersonnaModel $personna = null,
        array $options = []
    ): PersonnaModel {
        $personna = $personna ?? new PersonnaModel($options);
        $personna->setId($this->generateId());
        try {
            $this->file->create($personna);
        } catch (PersonnaFileException $ex) {
            throw new PersonnaRepositoryException($ex->getMessage(), $ex->getCode());
        }

        return $personna;
    }

    /**
     * @return int
     * @throws PersonnaRepositoryException
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

    /**
     * @param int $id
     * @return PersonnaModel
     * @throws PersonnaRepositoryException
     */
    final public function read(int $id): PersonnaModel
    {
        foreach ($this->getAll() as $personna) {
            if ($personna->getId() === $id) {
                return $personna;
            }
        }

        throw new PersonnaRepositoryException("Le personna n'existe pas", 102);
    }

    /**
     * @param PersonnaModel $personna
     * @return PersonnaModel
     * @throws PersonnaRepositoryException
     */
    final public function update(PersonnaModel $personna): PersonnaModel
    {
        try {
            $this->file->update($personna);
        } catch (PersonnaFileException $ex) {
            throw new PersonnaRepositoryException($ex->getMessage(), $ex->getCode());
        }

        return $personna;
    }

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaRepositoryException
     */
    final public function delete(PersonnaModel $personna): void
    {
        try {
            $this->file->delete($personna);
        } catch (PersonnaFileException $ex) {
            throw new PersonnaRepositoryException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @return PersonnaModel[]
     * @throws PersonnaRepositoryException
     */
    final public function getAll(): array
    {
        try {
            return $this->file->getAll();
        } catch (PersonnaFileException $ex) {
            throw new PersonnaRepositoryException($ex->getMessage(), $ex->getCode());
        }
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