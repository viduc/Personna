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
use Viduc\Personna\Model\ErreurModel;
use Viduc\Personna\Reponses\Reponse;

class ReponseTest extends TestCase
{
    private Reponse $reponse;
    final public function setUp(): void
    {
        parent::setUp();
        $this->reponse = new Reponse();
    }

    /**
     * @test
     * @return void
     */
    final public function setErreur(): void
    {
        self::assertNull($this->reponse->setErreur(new ErreurModel()));
    }

    /**
     * @test
     * @return void
     */
    final public function getErreur(): void
    {
        self::assertInstanceOf(
            ErreurModel::class,
            $this->reponse->getErreur()
        );
    }
}