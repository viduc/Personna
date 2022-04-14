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
use Viduc\Personna\File\Folder;
use Viduc\Personna\Model\PersonnaModel;

class FileTest extends TestCase
{
    private File $file;
    private string $path;

    final public function setUp(): void
    {
        parent::setUp();
        $this->path = str_ireplace('File', 'Ressources/', __DIR__);
        $folder = $this->createMock(Folder::class);
        $folder->method('create')->willReturnSelf();
        $this->file = new File($this->path, $folder);
        $this->nettoyerFichiersJson();
    }

    /**
     * @test
     * @return void
     * @throws PersonnaFileException
     */
    final public function create(): void
    {
        self::assertNull($this->file->create(new PersonnaModel()));
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
     * @throws PersonnaFileException
     */
    final public function update(): void
    {
        fopen($this->path . 'username.personna', 'wb');
        self::assertNull($this->file->update(new PersonnaModel()));
    }

    /**
     * @test
     * @return void
     */
    final public function updateException(): void
    {
        try {
            $this->file->update(new PersonnaModel());
        } catch (PersonnaFileException $ex) {
            self::assertEquals(
                "Le personna username n'existe pas",
                $ex->getMessage()
            );
            self::assertEquals(102, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     * @throws PersonnaFileException
     */
    final public function delete(): void
    {
        fopen($this->path . 'username.personna', 'wb');
        self::assertNull($this->file->delete(new PersonnaModel()));
    }

    /**
     * @test
     * @return void
     */
    final public function deleteException(): void
    {
        try {
            $this->file->delete(new PersonnaModel());
        } catch (PersonnaFileException $ex) {
            self::assertEquals(
                "Le personna username n'existe pas",
                $ex->getMessage()
            );
            self::assertEquals(102, $ex->getCode());
        }
    }

    /**
     * @test
     * @return void
     * @throws \JsonException|PersonnaFileException
     */
    final public function getAll(): void
    {
        $personna1 = new PersonnaModel(['username' => 'getall1']);
        $personna2 = new PersonnaModel(['username' => 'getall2']);
        file_put_contents(
            $this->path . 'getall1.personna',
            json_encode($personna1->jsonSerialize(), JSON_THROW_ON_ERROR)
        );
        file_put_contents(
            $this->path . 'getall2.personna',
            json_encode($personna2->jsonSerialize(), JSON_THROW_ON_ERROR)
        );
        self::assertCount(2, $this->file->getAll());
        self::assertEquals('getall1', $this->file->getAll()[0]->getUsername());
        self::assertEquals('getall2', $this->file->getAll()[1]->getUsername());
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