<?php namespace lib\date;

use DateTime;

class Date {

	private static $months = [
		'janeiro',
		'fevereiro',
		'março',
		'abril',
		'maio',
		'junho',
		'julho',
		'agosto',
		'setembro',
		'outubro',
		'novembro',
		'dezembro'
	];

	private static $centuries = [
		'I',
		'II',
		'III',
		'IV',
		'V',
		'VI',
		'VII',
		'VIII',
		'IX',
		'X',
		'XI',
		'XII',
		'XIII',
		'XIV',
		'XV',
		'XVI',
		'XVII',
		'XVIII',
		'XIX',
		'XX',
		'XXI',
		'XXII',
		'XXIII'
	];

	public static function formatDate($date)
	{
		$formattedDate = DateTime::createFromFormat('d/m/Y', $date);
		
		if ($formattedDate &&
			DateTime::getLastErrors()["warning_count"] == 0 &&
			DateTime::getLastErrors()["error_count"] == 0)
				return $formattedDate->format('Y-m-d');

		return null;
	}

	public static function translate($date) {
		
		if ($date == null) return null;

		//verifica se é um intervalo
		if (strpos($date, '/') !== false) {
			return ucfirst(self::translateInterval($date));
		}
		return ucfirst(self::translateDate($date));	
	}

	public static function translateInterval($date) {
		$dates = explode('/', $date);
		
		if ( self::isCentury($dates[0]) && self::isCentury($dates[1]) )
			return 'entre o ' . self::translateDate($dates[0]) . ' e o ' . self::translateDate($dates[1]);

		if ( self::isDecade($dates[0]) && self::isDecade($dates[1]) )
			return 'entre a ' . self::translateDate($dates[0]) . ' e a ' . self::translateDate($dates[1]);

		return 'entre ' . self::translateDate($dates[0]) . ' e ' . self::translateDate($dates[1]);
	}

	public static function translateDate($date) {
		if (preg_match('#\d{4,}-\d{2,}-\d{2,}#', $date, $match)) {
			$datetimeObj = DateTime::createFromFormat('Y-m-d', $match[0]);
			$day = $datetimeObj->format('d');
			$monthNumber = intval($datetimeObj->format('m'));
			$year = $datetimeObj->format('Y');
			$month = self::$months[$monthNumber - 1];
			return $day . ' de ' . $month . ' de ' . $year;
		}

		if (preg_match('#\d{4,}-\d{2,}#', $date)) {
			$datetimeObj = DateTime::createFromFormat('Y-m', $date);
			$monthNumber = intval($datetimeObj->format('m'));
			$year = $datetimeObj->format('Y');
			$month = self::$months[$monthNumber - 1];
			return $month . ' de ' . $year;
		}

		if (preg_match('#\d{4,}#', $date)) {
			return $date; //date = year, neste caso
		}

		if (preg_match('#\d{3,}#', $date)) {
			return 'década de ' . (intval($date) * 10);
		}
		if (preg_match('#\d{2,}#', $date)) {
			return 'século ' . self::$centuries[intval($date)];
		}


		return null;
	}

	public static function isDecade($date) {
		return strlen($date) == 3;
	}

	public static function isCentury($date) {
		return strlen($date) == 2;
	}
}