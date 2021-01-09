<?php
class TerminalTable {
	private $model;
	private $longest;
	function __construct(TerminalTableModel $model) {
		$this->model = $model;
	}

	public function getLongestStrings(): LongestStrings {
		$longest = new LongestStrings($this->model->getColumns());
		if($this->model->hasTitle()) {
			for($col=0;$col<$this->model->getColumns();$col++) {
				$longest->getItem($col)->addString($this->model->getTitle($col));
			}
		}
		for($row = 0;$row<$this->model->getRows();$row++) {
			for($col=0;$col<$this->model->getColumns();$col++) {
				$longest->getItem($col)->addString($this->model->getCell($col, $row));
			}
		}
	return $longest;
	}
	
	function getCell($col, $row, LongestStrings $longest): string {
		$str = $this->model->getCell($col, $row);
		$pad = $longest->getItem($col)->getLength()- mb_strlen($str);
		$cell = $str.str_repeat(" ", $pad);
	return $cell;
	}
	
	function getLines(): array {
		$this->model->load();
		$lines = array();
		if($this->model->getColumns()<=0) {
			return $lines;
		}
		$longest = $this->getLongestStrings();
		$line = array();
		if($this->model->hasTitle()) {
			for($col=0;$col<$this->model->getColumns();$col++) {
				$str = $this->model->getTitle($col);
				$pad = $longest->getItem($col)->getLength();
				$line[] = str_pad($str, $pad, " ");
			}
		$lines[] = implode(" ", $line);
		}

		for($row = 0;$row<$this->model->getRows();$row++) {
			$line = array();
			for($col=0;$col<$this->model->getColumns();$col++) {
				$line[] = $this->getCell($col, $row, $longest);
			}
		$lines[] = implode(" ", $line);
		}
	return $lines;
	}
}