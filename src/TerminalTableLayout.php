<?php
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
	function getCellJustify(int $col, int $row): int;
	function getCellFore(int $col, int $row): int;
	function getCellBack(int $col, int $row): int;
	function getCellAttr(int $col, int $row): array;
}