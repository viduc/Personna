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
use Viduc\Personna\Interfaces\Presenters\PresenterInterface;
use Viduc\Personna\Interfaces\Reponses\ReponseInterface;
use Viduc\Personna\Interfaces\Requetes\RequeteInterface;
use Viduc\Personna\Model\PersonnaModel;
use Viduc\Personna\Tests\Ressources\File;

class PersonnaTest extends TestCase
{
    private Personna $personna;
    private RequeteInterface $requete;
    private PresenterInterface $presenter;

    final public function setUp(): void
    {
        parent::setUp();
        $this->personna = new Personna('test');
        $this->personna->setFile(new File());
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

