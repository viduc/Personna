<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\File;

use Viduc\Personna\Exceptions\PersonnaFileException;
use \Viduc\Personna\Interfaces\File\FolderInterface;

class Folder implements FolderInterface
{

    /**
     * @inheritDoc
     */
    final public function exist(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * @inheritDoc
     */
    public function create(string $path): void
    {
        if (is_dir($path)) {
            return;
        }
        ob_start();
        try {
            if (!mkdir($path, 775, false) && !is_dir($path)) {
                throw new PersonnaFileException(
                    "Le dossier n'a pas pu être créé",
                    105
                );
            }
        } catch (\Exception) {
            ob_end_clean();
            throw new PersonnaFileException(
                "Le dossier n'a pas pu être créé",
                105
            );
        }
        ob_end_clean();
    }
}