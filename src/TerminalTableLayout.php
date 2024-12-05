<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
interface TerminalTableLayout {
	const LEFT = 1;
	const RIGHT = 2;
	const RESET = VTC::RESET;
	const BRIGHT = VTC::BRIGHT;
	const DIM = VTC::DIM;
	const UNDERSCORE = VTC::UNDERSCORE;
	const BLINK = VTC::BLINK;
	const HIDDEN = VTC::HIDDEN;
	const BLACK = VTC::BLACK;
	const RED = VTC::RED;
	const GREEN = VTC::GREEN;
	const YELLOW = VTC::YELLOW;
	const BLUE = VTC::BLUE;
	const MAGENTA = VTC::MAGENTA;
	const CYAN = VTC::CYAN;
	const WHITE = VTC::WHITE;
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
	 * Get color value to determine foreground color; use VTC::RESET to keep
	 * default.
	 * @param int $col
	 * @param int $row
	 */
	function getCellFore(int $col, int $row): int;

	/**
	 * Get background color
	 * 
	 * Get color value to determine background color; use VTC::RESET to keep
	 * default.
	 * @param int $col
	 * @param int $row
	 */
	function getCellBack(int $col, int $row): int;
	
	/**
	 * Get attributes
	 * 
	 * Get array of attributes.
	 * @param int $col
	 * @param int $row
	 * @return list<int> Description
	 */
	function getCellAttr(int $col, int $row): array;
}