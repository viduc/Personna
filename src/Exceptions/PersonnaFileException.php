<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/
namespace Viduc\Personna\Exceptions;

use Exception;

/**
 * 100 -> Le personna <personna> existe  déjà
 * 101 -> Erreur JSON
 * 102 -> le personna <personna> n'existe pas
 * 103 -> "L'enregistrement du personna <personna> a échoué"
 */
class PersonnaFileException extends Exception
{

}