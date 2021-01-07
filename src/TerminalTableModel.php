<?php
interface TerminalTableModel {
	function getCell($col, $row): string;
	function load();
	function getColumns(): int;
	function getRows(): int;
	function hasTitle(): bool;
	function getTitle($col): string;
}