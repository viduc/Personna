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
        //$requete
        self::assertInstanceOf(
            PresenterInterface::class,
            $this->personna->execute($this->requete, $this->presenter)
        );
    }
}

class Presenter implements PresenterInterface
{

}

class Requete implements RequeteInterface
{

}