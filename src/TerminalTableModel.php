<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
interface TerminalTableModel {
	/**
	 * Get specific cell
	 * 
	 * Gets a specific cell as indexed by column and row. Please note that both
	 * are supposed to be 0-indexed.
	 * @param type $col Column
	 * @param type $row Row
	 */
	function getCell($col, $row): string;
	
	/**
	 * Load data
	 * 
	 * Load will be called by TerminalTable as soon as the data is needed.
	 * Please take note that load may be called several times, ie if a table is
	 * redrawn. You should cache or clear data, in order to prevent long loading
	 * times or a growing number of repeating values.
	 */
	function load();
	
	/**
	 * Get columns
	 * 
	 * Get the amount of columns within a table.
	 */
	function getColumns(): int;
	
	/**
	 * Get rows
	 * 
	 * Get the amount of rows within a table.
	 */
	function getRows(): int;
	
	/**
	 * Table has title?
	 * 
	 * Determines whether a table should have a title over each column or not.
	 * Please note that titles won't be colored or justified; they will always
	 * have default color and „justify left“.
	 */
	function hasTitle(): bool;
	
	/**
	 * Get specific title
	 * 
	 * Get a specific title for a column. Please note that getTitle won't be
	 * called if hasTitle returns FALSE.
	 * @param string $col
	 */
	function getTitle($col): string;
}