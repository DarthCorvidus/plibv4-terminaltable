<?php
namespace plibv4\terminaltable;
use plibv4\vtc\VTCAttribute;
use plibv4\vtc\VTCColor;

final class ExampleColor implements TerminalTableLayout {
	#[\Override]
	public function getCellAttr(int $col, int $row): array {
		if($col==8 && $row == 0) {
			return array(VTCAttribute::DIM, VTCAttribute::UNDERSCORE);
		}
		return array();
	}

	#[\Override]
	public function getCellBack(int $col, int $row): VTCColor {
		if($col==8 && $row == 1) {
			return VTCColor::GREEN;
		}
	return VTCColor::NONE;
	}

	#[\Override]
	public function getCellFore(int $col, int $row): VTCColor {
		if($col==8 && $row == 2) {
			return VTCColor::GREEN;
		}
		return VTCColor::NONE;
	}

	#[\Override]
	public function getCellJustify(int $col, int $row): TerminalTableJustify {
		return TerminalTableJustify::LEFT;
	}

}