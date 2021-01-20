<?php
require './src/TerminalTableModel.php';
require './src/TerminalTableLayout.php';
require './src/TerminalTable.php';
require './tests/TerminalTableDemo.php';
require './tests/TerminalTableJustify.php';
require './tests/TerminalTableColor.php';
if(file_exists("./vendor/autoload.php")) {
	require "./vendor/autoload.php";
} else {
	require '../plibv4-longeststring/src/LongestString.php';
	require '../plibv4-longeststring/src/LongestStrings.php';
	require '../plibv4-vtc/src/VTC.php';
}