<?php namespace lib\metadata;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Exiv2 {

	private $originalFileExtension;
	private $imageId;
	private $imagesPath;
	private $log;

	public function __construct($originalFileExtension, $imageId, $imagesPath) {
		$this->originalFileExtension = $originalFileExtension;
		$this->imageId = $imageId;
		$this->imagesPath = $imagesPath;
	}

	public function setImageAuthor($author)
	{
		$command = sprintf("Exif.Image.XPAuthor %s", $this->toXP($author));
		$this->runExif2($command);
	}

	public function setArtist($artist, $user) {
		$command = sprintf("Exif.Image.Artist %s - %s", $artist, $user);
		$this->runExif2($command);
	}
	
	public function setCopyRight($author, $ccl) {
		$command = sprintf("Exif.Image.Copyright %s - %s - %s", $author, $ccl->getLongLicenseName(), $ccl->getURIString());
		$this->runExif2($command);
		$command = sprintf("Iptc.Application2.Copyright %s - %s - %s", $author, $ccl->getLongLicenseName(), $ccl->getURIString());
		$this->runExif2($command);
	}
	
	public function setDescription($description) {
		$command = sprintf("Exif.Image.ImageDescription %s", $description);
		$this->runExif2($command);
	}
	
	public function setUserComment($userComment) {
		$command = sprintf("Exif.Photo.UserComment %s", $userComment);
		$this->runExif2($command);
	}

	private function toXP($string) {
		$bytes = unpack('c*', $string);
		$result = '';
		foreach($bytes as $b) {
			$result .= $b . ' 0 ';
		}
		$result .= '0 0';
		return $result;
	}

	private function runExif2($command) {		
		$this->runExif2_internal('_original', $this->originalFileExtension, $command);
		$this->runExif2_internal('_200h', 'jpg', $command);
		$this->runExif2_internal('_view', 'jpg', $command);
	}

	private function runExif2_internal($sufix, $extension, $command) {
		$fileName = sprintf("%s%s%s.%s", $this->imagesPath, $this->imageId, $sufix, $extension);
		$cmd = 'exiv2 -M "set ' . $command . '" ' . $fileName;
		$cmd;
		system($cmd, $retval);
		if ($retval != 0) {
			$this->log_error($cmd, $retval);
		}
	}

	private function create_log() {
		$today = date('Y-m-d');
		$log = new Logger('Exiv2_logger');
		$file = storage_path() . '/logs/exiv2/' . $today . '.log';
		if (!file_exists($file)) {
			$handle = fopen($file, 'a+');
			fclose($handle);
		}

		$log->pushHandler(new StreamHandler($file, Logger::ERROR));		
		return $log;
	}

	private function log_error($cmd, $retval) {
		if (!isset($this->log)) $this->log = $this->create_log();
		$this->log->addError("Houve um erro ao executar o seguinte comando:\n" . $cmd);
	}
}
