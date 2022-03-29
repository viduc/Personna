<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace File;

use PHPUnit\Framework\TestCase;
use Viduc\Personna\File\File;
use Viduc\Personna\Model\PersonnaModel;

class FileTest extends TestCase
{
    private File $file;

    final public function setUp(): void
    {
        parent::setUp();
        $this->file = new File('path');
    }

    /**
     * @test
     * @return void
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
}