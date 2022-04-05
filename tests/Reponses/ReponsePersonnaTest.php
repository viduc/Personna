<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Reponses;

use PHPUnit\Framework\TestCase;
use Viduc\Personna\Model\PersonnaModel;
use Viduc\Personna\Reponses\ReponsePersonna;

class ReponsePersonnaTest extends TestCase
{
    private ReponsePersonna $reponse;

    final public function setUp(): void
    {
        parent::setUp();
        $this->reponse = new ReponsePersonna([new PersonnaModel()]);
    }

    /**
     * @test
     * @return void
     */
    final public function setPersonnas(): void
    {
        self::assertNull($this->reponse->setPersonnas([new PersonnaModel()]));
    }

    /**
     * @test
     * @return void
     */
    final public function getPersonnas(): void
    {
        self::assertIsArray($this->reponse->getPersonnas());
    }

    /**
     * @test
     * @return void
     */
    final public function addPersonna(): void
    {
        self::assertNull($this->reponse->addPersonna(new PersonnaModel()));
    }
}