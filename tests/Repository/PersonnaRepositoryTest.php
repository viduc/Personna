<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Repository;

use Doctrine\ORM\Exception\RepositoryException;
use PHPUnit\Framework\TestCase;
use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\Exceptions\PersonnaRepositoryException;
use Viduc\Personna\Model\PersonnaModel;
use Viduc\Personna\Repository\PersonnaRepository;
use Viduc\Personna\Tests\Ressources\File;

class PersonnaRepositoryTest extends TestCase
{
    private PersonnaRepository $repository;
    private File $file;

    final public function setUp(): void
    {
        parent::setUp();
        $this->file = new File();
        $this->repository = new PersonnaRepository($this->file);
    }

    /**
     * @test
     * @return void
     * @throws PersonnaRepositoryException
     */
    final public function create(): void
    {
        self::assertEquals(0, $this->repository->create(null, [])->getId());
    }

    /**
     * @test
     * @return void
     */
    final public function createException(): void
    {
        try {
            $this->repository->create(null, ['username' => 'testException']);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals('test', $ex->getMessage());
            self::assertEquals(100, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     * @throws PersonnaRepositoryException
     */
    final public function read(): void
    {
        self::assertEquals(666, $this->repository->read(666)->getId());
    }

    /**
     * @test
     * @return void
     */
    final public function readException(): void
    {
        try {
            $this->repository->read(1478);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "Le personna n'existe pas",
                $ex->getMessage()
            );
            self::assertEquals(102, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     * @throws PersonnaRepositoryException
     */
    final public function update(): void
    {
        $persona = new PersonnaModel(['id' => 321]);
        self::assertEquals(321, $this->repository->update($persona)->getId());
    }

    /**
     * @test
     * @return void
     */
    final public function updateException(): void
    {
        $persona = new PersonnaModel(['id' => 421]);
        try {
            $this->repository->update($persona);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "Le personna username n'existe pas",
                $ex->getMessage()
            );
            self::assertEquals(102, $ex->getCode());
        }
        $persona = new PersonnaModel(['id' => 521]);
        try {
            $this->repository->update($persona);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "L'enregistrement du personna username a échoué",
                $ex->getMessage()
            );
            self::assertEquals(103, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     */
    final public function deleteException(): void
    {
        $persona = new PersonnaModel(['id' => 421]);
        try {
            $this->repository->delete($persona);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "Le personna username n'existe pas",
                $ex->getMessage()
            );
            self::assertEquals(102, $ex->getCode());
        }
        $persona = new PersonnaModel(['id' => 521]);
        try {
            $this->repository->delete($persona);
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "La suppression du personna username a échouée",
                $ex->getMessage()
            );
            self::assertEquals(104, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     */
    final public function getAllException(): void
    {
        $this->file->getAllExecption = true;
        try {
            $this->repository->getAll();
        } catch (PersonnaRepositoryException $ex) {
            self::assertEquals(
                "Le chargement d'un fichier personna test a échoué",
                $ex->getMessage()
            );
            self::assertEquals(101, $ex->getCode());
        }
    }
}