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
        $this->reponse = new ReponsePersonna(new PersonnaModel());
    }

    /**
     * @test
     * @return void
     */
    final public function setPersonnaModel(): void
    {
        self::assertNull($this->reponse->setPersonnaModel(new PersonnaModel()));
    }

    /**
     * @test
     * @return void
     */
    final public function getPersonnaModel(): void
    {
        self::assertInstanceOf(
            PersonnaModel::class,
            $this->reponse->getPersonnaModel()
        );
    }
}