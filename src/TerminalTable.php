<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
class TerminalTable {
	private $model;
	private $modelLayout;
	/**
	 * Construct a TerminalTable
	 * 
	 * Note that TerminalTable will automatically use your model as layout if it
	 * implements TerminalTableLayout as well.
	 * @param TerminalTableModel $model
	 */
	function __construct(TerminalTableModel $model) {
		$this->model = $model;
		if($this->model instanceof TerminalTableLayout) {
			$this->modelLayout = $model;
		}
	}
	
	/**
	 * Set Layout
	 * 
	 * If you want to keep Layout & Model separate, you can set a layout using
	 * another instance.
	 * @param TerminalTableLayout $layout
	 */
	function setLayout(TerminalTableLayout $layout) {
		$this->modelLayout = $layout;
	}
	
	/**
	 * Return LongestStrings
	 * 
	 * Returns an instance of LongestStrings whose instance of LongestString
	 * contain the maximum string length for each column.
	 * @return LongestStrings
	 */
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
	
	private function getColorAttr(string $str, int $col, int $row): string {
		/**
		 * empty strings do not need colors or attributes
		 */
		if($str==="") {
			return "";
		}
		$vtc = new VTC();
		$fore = $this->modelLayout->getCellFore($col, $row);
		$vtc->setForeground($this->modelLayout->getCellFore($col, $row));
		$vtc->setBackground($this->modelLayout->getCellBack($col, $row));
		$vtc->setAttributes($this->modelLayout->getCellAttr($col, $row));
		$colorized = $vtc->getACString($str);
	return $colorized;
	}
	
	/**
	 * Get specific cell
	 * 
	 * Gets a specific cell as identified by column and row number. String will
	 * be justified and have color & attributes [not done yet].
	 * @param type $col
	 * @param type $row
	 * @param LongestStrings $longest
	 * @return string
	 */
	function getCell($col, $row, LongestStrings $longest): string {
		$str = $this->model->getCell($col, $row);
		$pad = $longest->getItem($col)->getLength()- mb_strlen($str);
		/*
		 * If there is no layout, we can branch out early.
		 */
		if($this->modelLayout===NULL) {
			return $str.str_repeat(" ", $pad);
		}
		
		$colorized = $this->getColorAttr($str, $col, $row);
		
		if($this->modelLayout->getCellJustify($col, $row)=== TerminalTableLayout::RIGHT) {
			$cell = str_repeat(" ", $pad).$colorized;
		} else {
			$cell = $colorized.str_repeat(" ", $pad);
		}
	return $cell;
	}
	
	/**
	 * Get table lines
	 * 
	 * Get properly positioned table columns as an array of lines.
	 * @return array
	 */
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
	
	/**
	 * Print table
	 * 
	 * Prints table directly to STDOUT
	 */
	function printTable() {
		echo implode(PHP_EOL, $this->getLines()).PHP_EOL;
	}
	
	/**
	 * Get String
	 * 
	 * Get table as string.
	 */
	function getString(): string {
		return implode(PHP_EOL, $this->getLines()).PHP_EOL;
	}
}