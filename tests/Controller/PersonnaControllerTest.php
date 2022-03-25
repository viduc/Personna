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
use viduc\personna\src\Interfaces\Presenters\PresenterInterface;
use viduc\personna\src\Interfaces\Reponses\ReponseInterface;
use viduc\personna\src\Interfaces\Requetes\RequeteInterface;

class PersonnaControllerTest extends TestCase
{
    private PersonnaController $personna;
    private RequeteInterface $requete;
    private PresenterInterface $presenter;

    final public function setUp(): void
    {
        parent::setUp();
        $this->personna = new PersonnaController();
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

    final public function getAction(): string
    {
        return $this->action;
    }
}