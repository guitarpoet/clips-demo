<?php namespace Demo\Models; in_array(__FILE__, get_included_files()) or exit("No direct script access allowed");

use Clips\Libraries\DBModel;

/**
 * @Clips\Model
 */
class PlaceModel extends DBModel {
	public function listCity($province) {
		switch($province) {
			case "Jiangsu":
				return array("Suzhou", "Nanjing");
		}
		return false;
	}

	public function listDistrict($city) {
		switch($city) {
			case "Suzhou":
				return array("Yuanqu", "Xinqu");
			case "Nanjing":
				return array("Gulou", "POI!!!");
		}
		return false;
	}
}