<?php
class TerminalTableJustify implements TerminalTableLayout {
	public function getCellAttr(int $col, int $row): array {
		return array();
	}

	public function getCellBack(int $col, int $row): VTCColor {
		return VTCColor::RESET;
	}

	public function getCellFore(int $col, int $row): VTCColor {
		return VTCColor::RESET;
	}

	public function getCellJustify(int $col, int $row): int {
		if(in_array($col, array(1, 4, 6))) {
			return self::RIGHT;
		}
		return self::LEFT;
	}

}