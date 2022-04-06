<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Interfaces\File;

interface FolderInterface
{
    /**
     * @param string $path
     * @return bool
     */
    public function exist(string $path): bool;

    /**
     * @param string $path
     * @return void
     */
    public function create(string $path): void;
}