<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Controller;

use PHPUnit\Framework\TestCase;

use Viduc\Personna\Controller\Personna;
use Viduc\Personna\Exceptions\PersonnaRepositoryException;
use Viduc\Personna\Interfaces\Presenters\PresenterInterface;
use Viduc\Personna\Interfaces\Reponses\ReponseInterface;
use Viduc\Personna\Interfaces\Requetes\RequeteInterface;
use Viduc\Personna\Model\PersonnaModel;
use Viduc\Personna\Repository\PersonnaRepository;
use Viduc\Personna\Tests\Ressources\File;
use Viduc\Personna\Tests\Ressources\PersonnaRequete;

class PersonnaTest extends TestCase
{
    private Personna $personna;
    private RequeteInterface $requete;
    private PresenterInterface $presenter;
    private PersonnaRepository $repository;

    final public function setUp(): void
    {
        parent::setUp();
        $this->personna = new Personna('test');
        $this->personna->setFile(new File());
        $this->presenter = new Presenter();
        $this->requete = new PersonnaRequete();
        $this->repository = $this->createMock(PersonnaRepository::class);
        $this->personna->setRepository($this->repository);
    }

    /**
     * @test
     * @return void
     */
    final public function executeCreate(): void
    {
        $this->requete->setAction('create');
        $this->requete->setParam(['personna' => new PersonnaModel()]);
        $this->repository->method('create')->willReturn(new PersonnaModel());
        self::assertInstanceOf(
            ReponseInterface::class,
            $this->personna->execute($this->requete, $this->presenter)->reponse
        );
    }

    /**
     * @test
     * @return void
     */
    final public function executeCreateException(): void
    {
        $this->requete->setAction('create');
        $this->requete->setParam(['personna' => new PersonnaModel()]);
        $this->repository->method('create')->willThrowException(
            new PersonnaRepositoryException('test', 100)
        );
        self::assertEquals(
            'test',
            $this->personna->execute(
                $this->requete,
                $this->presenter
            )->reponse->getErreur()->getMessage()
        );
        self::assertEquals(
            100,
            $this->personna->execute(
                $this->requete,
                $this->presenter
            )->reponse->getErreur()->getCode()
        );

        $this->requete->setParam([]);
        self::assertEquals(
            "Le paramètre personna n'existe pas",
            $this->personna->execute(
                $this->requete,
                $this->presenter
            )->reponse->getErreur()->getMessage()
        );
        self::assertEquals(
            100,
            $this->personna->execute(
                $this->requete,
                $this->presenter
            )->reponse->getErreur()->getCode()
        );
    }

    /**
     * @test
     * @return void
     */
    final public function executeTest(): void
    {

        /** read */
        $this->requete->action = 'read';
        $this->presenter->reinitialize();
        self::assertInstanceOf(
            ReponseInterface::class,
            $this->personna->execute($this->requete, $this->presenter)->reponse
        );
        /** update */
        $this->requete->action = 'update';
        $this->presenter->reinitialize();
        self::assertInstanceOf(
            ReponseInterface::class,
            $this->personna->execute($this->requete, $this->presenter)->reponse
        );
        /** delete */
        $this->requete->action = 'delete';
        $this->presenter->reinitialize();
        self::assertInstanceOf(
            ReponseInterface::class,
            $this->personna->execute($this->requete, $this->presenter)->reponse
        );
    }
}

class Presenter implements PresenterInterface
{
    public $reponse;
    final public function presente(ReponseInterface $reponse): void
    {
        $this->reponse = $reponse;
    }

    final public function reinitialize(): void
    {
        $this->reponse = null;
    }
}

