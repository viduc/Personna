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
 * 102 -> Le personna n'existe pas
 */
class PersonnaRepositoryException extends Exception
{

}