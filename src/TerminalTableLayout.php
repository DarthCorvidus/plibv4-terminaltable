<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
interface TerminalTableLayout {
	const LEFT = 1;
	const RIGHT = 2;
	/**
	 * Get cell justify
	 * 
	 * Determines if cell should be justified left or right.
	 * @param int $col
	 * @param int $row
	 */
	function getCellJustify(int $col, int $row): int;

	/**
	 * Get foreground color
	 * 
	 * Get color value to determine foreground color; use VTCColor::Reset to keep
	 * default.
	 * @param int $col
	 * @param int $row
	 */
	function getCellFore(int $col, int $row): VTCColor;

	/**
	 * Get background color
	 * 
	 * Get color value to determine background color; use VTCColor::RESET to keep
	 * default.
	 * @param int $col
	 * @param int $row
	 */
	function getCellBack(int $col, int $row): VTCColor;
	
	/**
	 * Get attributes
	 * 
	 * Get array of attributes.
	 * @param int $col
	 * @param int $row
	 * @return list<VTCAttribute> Description
	 */
	function getCellAttr(int $col, int $row): array;
}