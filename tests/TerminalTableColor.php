<?php
class TerminalTableColor implements TerminalTableLayout {
	public function getCellAttr(int $col, int $row): array {
		if($col==8 && $row == 0) {
			return array(VTC::DIM, VTC::UNDERSCORE);
		}
		return array();
	}

	public function getCellBack(int $col, int $row): int {
		if($col==8 && $row == 1) {
			return VTC::GREEN;
		}
	return 0;
	}

	public function getCellFore(int $col, int $row): int {
		if($col==8 && $row == 2) {
			return VTC::GREEN;
		}
		return 0;
	}

	public function getCellJustify(int $col, int $row): int {
		return self::LEFT;
	}

}