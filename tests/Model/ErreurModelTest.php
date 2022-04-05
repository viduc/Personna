<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace Viduc\Personna\Tests\Model;

use PHPUnit\Framework\TestCase;
use Viduc\Personna\Model\ErreurModel;

class ErreurModelTest extends TestCase
{
    /**
     * @var ErreurModel
     */
    private ErreurModel $erreur;

    final public function setUp(): void
    {
        parent::setUp();
        $this->erreur = new ErreurModel();
    }

    /**
     * @test
     * @return void
     */
    final public function erreurModel(): void
    {
        self::assertEquals(0, $this->erreur->getCode());
        self::assertEquals('erreur', $this->erreur->getMessage());
        self::assertEquals('redirect', $this->erreur->getRedirect());
        $this->erreur->setCode(100);
        $this->erreur->setMessage('test');
        $this->erreur->setRedirect('test');
        self::assertEquals(100, $this->erreur->getCode());
        self::assertEquals('test', $this->erreur->getMessage());
        self::assertEquals('test', $this->erreur->getRedirect());
    }
}