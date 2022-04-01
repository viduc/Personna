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
 * 101 -> Le chargement d'un fichier personna <file> a échoué
 * 102 -> Le personna n'existe pas
 * 103 -> L'enregistrement du personna <personna> a échoué
 * 104 -> La suppression du personna <personna> a échouée
 */
class PersonnaRepositoryException extends Exception
{

}