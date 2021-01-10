<?php
require './src/TerminalTableModel.php';
require './src/TerminalTableLayout.php';
require './src/TerminalTable.php';
require './tests/TerminalTableDemo.php';
require './tests/TerminalTableJustify.php';
require './tests/TerminalTableColor.php';
if(file_exists("../plibv4-longeststring/")) {
	require '../plibv4-longeststring/src/LongestString.php';
	require '../plibv4-longeststring/src/LongestStrings.php';
}

if(file_exists("../plibv4-vtc/")) {
	require '../plibv4-vtc/src/VTC.php';
}