<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace Viduc\Personna\Tests\File;

use PHPUnit\Framework\TestCase;
use Viduc\Personna\Exceptions\PersonnaFileException;
use Viduc\Personna\File\File;
use Viduc\Personna\Model\PersonnaModel;

class FileTest extends TestCase
{
    private File $file;
    private string $path;

    final public function setUp(): void
    {
        parent::setUp();
        $this->path = str_ireplace('File', 'Ressources/', __DIR__);
        $this->file = new File($this->path);
        $this->nettoyerFichiersJson();
    }

    /**
     * @test
     * @return void
     * @throws PersonnaFileException
     */
    final public function create(): void
    {
        self::assertInstanceOf(
            PersonnaModel::class,
            $this->file->create(new PersonnaModel())
        );
    }

    /**
     * @test
     * @return void
     */
    final public function createWithFileExiste(): void
    {
        fopen($this->path . 'username.personna', 'wb');
        try {
            $this->file->create(new PersonnaModel());
        } catch (PersonnaFileException $ex) {
            self::assertEquals(
                'Le personna username existe  déjà',
                $ex->getMessage()
            );
            self::assertEquals(
                100,
                $ex->getCode()
            );
        }
    }

    /**
     * @test
     * @return void
     */
    final public function read(): void
    {
        self::assertInstanceOf(
            PersonnaModel::class,
            $this->file->read(0)
        );
    }

    /**
     * @test
     * @return void
     */
    final public function update(): void
    {
        self::assertNull($this->file->update(new PersonnaModel()));
    }

    /**
     * @test
     * @return void
     */
    final public function delete(): void
    {
        self::assertNull($this->file->delete(new PersonnaModel()));
    }

    /**
     * @return void
     */
    private function nettoyerFichiersJson(): void
    {
        foreach (scandir($this->path) as $file) {
            if (strpos($file, '.personna')) {
                unlink($this->path . $file);
            }
        }
    }
}