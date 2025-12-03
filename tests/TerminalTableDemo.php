<?php
namespace plibv4\terminaltable;
class TerminalTableDemo implements TerminalTableModel {
	private $title = array();
	private Matrix $matrix;
	function __construct() {
		$this->matrix = new Matrix();
	}

	public function getCell($col, $row): string {
		//return $this->values[$row][$col];
		return $this->matrix->get($row, $col);
	}

	public function getColumns(): int {
	return count($this->title);
	}

	public function getRows(): int {
		return $this->matrix->getRows();
	}

	public function getTitle($col): string {
		return $this->title[$col];
	}

	public function hasTitle(): bool {
		return true;
	}

	public function load(): void {
		$this->matrix->clear();
		$this->title = array();
		$handle = fopen(__DIR__."/csv.txt", "r");
		$i=0;
		while($array = fgetcsv($handle, 0, ";")) {
			if($i==0) {
				$this->title = $array;
				$i++;
				continue;
			}
			$this->matrix->addRow($i-1, $array);
			//$this->values[] = $array;
			$i++;
		}
		fclose($handle);
	}

}