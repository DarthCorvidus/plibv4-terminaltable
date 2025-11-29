<?php
class TerminalTableColor implements TerminalTableLayout {
	public function getCellAttr(int $col, int $row): array {
		if($col==8 && $row == 0) {
			return array(VTCAttribute::DIM, VTCAttribute::UNDERSCORE);
		}
		return array();
	}

	public function getCellBack(int $col, int $row): VTCColor {
		if($col==8 && $row == 1) {
			return VTCColor::GREEN;
		}
	return VTCColor::RESET;
	}

	public function getCellFore(int $col, int $row): VTCColor {
		if($col==8 && $row == 2) {
			return VTCColor::GREEN;
		}
		return VTCColor::RESET;
	}

	public function getCellJustify(int $col, int $row): int {
		return self::LEFT;
	}

}