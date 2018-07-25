<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 25/07/2018
 * Time: 14:48
 */

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $taretDirectory;

    public function __construct($targetDirectory)
    {
        $this->taretDirectory = $targetDirectory;
    }

    public function upload (UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->taretDirectory;
    }
}