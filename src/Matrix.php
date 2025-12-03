<?php
namespace plibv4\terminaltable;
use OutOfBoundsException;
/**
 * Matrix is a simple wrapper around array(). Psalm is not very fond of array(),
 * and getting a typical approach of $this->values = array() somewhat type
 * declared is a *lot* of boilerplate.
 */
final class Matrix {
	/** @var array<string, string>*/
	private array $values = [];
	private int $rows = 0;
	private int $cols = 0;
	/**
	 * put value at row, column.
	 * @param int $row
	 * @param int $col
	 * @param string $value
	 * @return void
	 */
	function put(int $row, int $col, string $value): void {
		$this->values[$row.":".$col] = $value;
		if($this->rows<$row+1) {
			$this->rows = $row+1;
		}
		if($this->cols<$col+1) {
			$this->cols = $col+1;
		}
	}
	
	/**
	 * 
	 * @param int $row
	 * @param array<int, string> $values
	 * @return void
	 */
	function addRow(int $row, array $values): void {
		foreach ($values as $col => $value) {
			$this->put($row, $col, $value);
		}
	}

	/**
	 * OutOfBoundsException is thrown if a value is accessed which is outside
	 * the farthest extent that was added to Matrix.
	 * Returns empty string for values within bounds.
	 * @param int $row
	 * @param int $col
	 * @return string
	 * @throws OutOfBoundsException
	 */
	function get(int $row, int $col): string {
		if($row<0 or $row+1>$this->rows) {
			throw new OutOfBoundsException($row." out of bounds");
		}
		if($col<0 or $col+1>$this->cols) {
			throw new OutOfBoundsException($col." out of bounds");
		}

		if(!isset($this->values[$row.":".$col])) {
			return "";
		}
		return $this->values[$row.":".$col];
	}
	
	/**
	 * Clears all values and reset bounds.
	 * @return void
	 */
	function clear(): void {
		$this->values = array();
		$this->rows = 0;
		$this->cols = 0;
	}
	
	/**
	 * get amount of rows
	 * @return int
	 */
	function getRows(): int {
		return $this->rows;
	}
	
	/**
	 * get amount of columns
	 * @return int
	 */
	function getColumns(): int {
		return $this->cols;
	}
}
