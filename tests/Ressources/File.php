<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Ressources;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Model\PersonnaModel;

class File implements FileInterface
{
    /**
     * @param PersonnaModel $model
     * @return void
     * @throws PersonnaFileException
     */
    final public function create(PersonnaModel $model): void
    {
        if ($model->getUsername() === 'testException') {
            throw new PersonnaFileException('test', 100);
        }
    }

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    final public function update(PersonnaModel $personna): void
    {
        if ($personna->getId() === 421) {
            throw new PersonnaFileException(
                "Le personna " . $personna->getUsername() . " n'existe pas",
                102
            );
        }
        if ($personna->getId() === 521) {
            throw new PersonnaFileException(
                "L'enregistrement du personna " . $personna->getUsername() . " a échoué",
                103
            );
        }
    }

    /**
     * @param PersonnaModel $personna
     * @return void
     * @throws PersonnaFileException
     */
    final public function delete(PersonnaModel $personna): void
    {
        if ($personna->getId() === 421) {
            throw new PersonnaFileException(
                "Le personna " . $personna->getUsername() . " n'existe pas",
                102
            );
        }
        if ($personna->getId() === 521) {
            throw new PersonnaFileException(
                "La suppression du personna " . $personna->getUsername() . " a échouée",
                104
            );
        }
    }

    public bool $getAllExecption = false;

    /**
     * @return PersonnaModel[]
     * @throws PersonnaFileException
     */
    final public function getAll(): array
    {
        if (!$this->getAllExecption) {
            return [new PersonnaModel(['id'=>0]), new PersonnaModel(['id'=>666])];
        }
        throw new PersonnaFileException(
            "Le chargement d'un fichier personna test a échoué",
            101
        );
    }
}