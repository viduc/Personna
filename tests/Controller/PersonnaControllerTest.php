<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\tests\Controller;

use PHPUnit\Framework\TestCase;
use viduc\personna\src\Controller\PersonnaController;
use viduc\personna\src\Interfaces\Ports\PortPersonnaDaoInterface;
use viduc\personna\src\Interfaces\Presenters\PresenterInterface;
use viduc\personna\src\Interfaces\Reponses\ReponseInterface;
use viduc\personna\src\Interfaces\Requetes\RequeteInterface;
use viduc\personna\src\Model\PersonnaModel;

class PersonnaControllerTest extends TestCase
{
    private PersonnaController $personna;
    private RequeteInterface $requete;
    private PresenterInterface $presenter;

    final public function setUp(): void
    {
        parent::setUp();
        $this->personna = new PersonnaController(new Port());
        $this->presenter = new Presenter();
        $this->requete = new Requete();
    }

    /**
     * @test
     * @return void
     */
    final public function executeTest(): void
    {
        /** create */
        self::assertInstanceOf(
            ReponseInterface::class,
            $this->personna->execute($this->requete, $this->presenter)->reponse
        );
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

class Requete implements RequeteInterface
{

    public string $action = 'create';
    public array $params = [];

    public function __construct()
    {
        $this->params = [
            'id' => 0,
            'personna' => new PersonnaModel()
        ];
    }

    final public function getAction(): string
    {
        return $this->action;
    }

    final public function getParam(string $param): mixed
    {
        return $this->params[$param];
    }
}

class Port implements PortPersonnaDaoInterface
{

    final public function create(array $ptions): PersonnaModel
    {
        return new PersonnaModel();
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
}