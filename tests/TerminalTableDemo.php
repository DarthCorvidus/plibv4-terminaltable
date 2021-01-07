<?php
class TerminalTableDemo implements TerminalTableModel {
	private $values = array();
	private $title = array();
	function __construct() {
		;
	}

	public function getCell($col, $row): string {
		return $this->values[$row][$col];
	}

	public function getColumns(): int {
	return count($this->title);
	}

	public function getRows(): int {
		return count($this->values);
	}

	public function getTitle($col): string {
		return $this->title[$col];
	}

	public function hasTitle(): bool {
		return true;
	}

	public function load() {
		$this->values = array();
		$this->title = array();
		$handle = fopen("./tests/csv.txt", "r");
		$i=0;
		while($array = fgetcsv($handle, 0, ";")) {
			if($i==0) {
				$this->title = $array;
				$i++;
				continue;
			}
			$this->values[] = $array;
		}
		fclose($handle);
	}

}