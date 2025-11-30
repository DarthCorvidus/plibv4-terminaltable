<?php
class ExampleJustify implements TerminalTableLayout {
	public function getCellAttr(int $col, int $row): array {
		return array();
	}

	public function getCellBack(int $col, int $row): VTCColor {
		return VTCColor::RESET;
	}

	public function getCellFore(int $col, int $row): VTCColor {
		return VTCColor::RESET;
	}

	public function getCellJustify(int $col, int $row): TerminalTableJustify {
		if(in_array($col, array(1, 4, 6))) {
			return TerminalTableJustify::RIGHT;
		}
		return TerminalTableJustify::LEFT;
	}

}