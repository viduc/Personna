<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Viduc\Personna\Exceptions\PersonnaRepositoryException;
use Viduc\Personna\Model\PersonnaModel;
use Viduc\Personna\Repository\PersonnaRepository;
use Viduc\Personna\Tests\Ressources\File;

class PersonnaRepositoryTest extends TestCase
{
    private PersonnaRepository $repository;

    final public function setUp(): void
    {
        parent::setUp();
        $this->repository = new PersonnaRepository(new File());
    }

    /**
     * @test
     * @return void
     * @throws PersonnaRepositoryException
     */
    final public function create(): void
    {
        self::assertEquals(0, $this->repository->create([])->getId());
    }

    /**
     * @test
     * @return void
     */
    final public function createException(): void
    {
        try {
            $this->repository->create(['username' => 'testException']);
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
        self::assertInstanceOf(PersonnaModel::class, $this->repository->read(0));
    }

    /**
     * @test
     * @return void
     */
    final public function update(): void
    {
        $persona = new PersonnaModel();
        self::assertInstanceOf(PersonnaModel::class, $this->repository->update($persona));
    }

    /**
     * @test
     * @return void
     */
    final public function delete(): void
    {
        self::assertNull($this->repository->delete(new PersonnaModel()));
    }
}