<?php
namespace plibv4\terminaltable;
use Exception;
final class TerminalTableDemo implements TerminalTableModel {
	private array $title = array();
	private Matrix $matrix;
	function __construct() {
		$this->matrix = new Matrix();
	}

	#[\Override]
	public function getCell($col, $row): string {
		//return $this->values[$row][$col];
		return $this->matrix->get($row, $col);
	}

	#[\Override]
	public function getColumns(): int {
	return count($this->title);
	}

	#[\Override]
	public function getRows(): int {
		return $this->matrix->getRows();
	}

	#[\Override]
	public function getTitle($col): string {
		/** @psalm-suppress MixedReturnStatement */
		return $this->title[$col];
	}

	#[\Override]
	public function hasTitle(): bool {
		return true;
	}

	#[\Override]
	public function load(): void {
		$this->matrix->clear();
		$this->title = array();
		$path = __DIR__."/csv.txt";
		$handle = fopen($path, "r");
		if($handle === false) {
			throw new Exception("unable to open file ".$path);
		}
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