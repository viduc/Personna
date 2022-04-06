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
use Viduc\Personna\File\Folder;

class FolderTest extends TestCase
{
    private Folder $folder;
    private string $path;

    final public function setUp(): void
    {
        parent::setUp();
        $this->folder = new Folder();
        $this->path = str_replace('File', '', __DIR__);
        $this->nettoyerFolder();
        $this->modifierDroit();
    }

    /**
     * @test
     * @return void
     */
    final public function exist(): void
    {
        self::assertTrue($this->folder->exist($this->path . 'Ressources'));
        self::assertFalse($this->folder->exist($this->path . 'NonExiste'));
    }

    /**
     * @test
     * @return void
     * @throws PersonnaFileException
     */
    final public function create(): void
    {
        self::assertNull(
            $this->folder->create($this->path . 'Ressources/Folder/FolderExist')
        );
        self::assertNull(
            $this->folder->create($this->path . 'Ressources/Folder/FolderExist')
        );
    }

    /**
     * @test
     * @return void
     */
    final public function createException(): void
    {
        try {
            $this->modifierDroit(false);
            $this->folder->create($this->path . 'Ressources/Folder/FolderExist');
        } catch (PersonnaFileException $exception) {
            self::assertEquals(
                "Le dossier n'a pas pu être créé",
                $exception->getMessage()
            );
            self::assertEquals(105, $exception->getCode());
        }
    }

    /**
     * @return void
     */
    private function nettoyerFolder(): void
    {
        if (is_dir($this->path . 'Ressources/Folder/FolderExist')) {
            rmdir($this->path . 'Ressources/Folder/FolderExist');
        }
    }

    /**
     * @param string $path
     * @param string $droits
     * @return void
     */
    private function modifierDroit(bool $init = true): void
    {
        $init ? chmod($this->path . 'Ressources/Folder', 0777) :
            chmod($this->path . 'Ressources/Folder', 0444);
    }
}