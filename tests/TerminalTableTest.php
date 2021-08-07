<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require 'TerminalTableDemo.php';
require 'TerminalTableJustify.php';
require 'TerminalTableColor.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssertTest
 *
 * @author hm
 */
class TerminalTableTest extends TestCase {
	private $model;
	private $table;
	function setUp() {
		$this->model = new TerminalTableDemo();
		$this->table = new TerminalTable($this->model);
	}
	
	static function hex($string) {
		$new = "";
		for($i=0;$i<strlen($string);$i++) {
			if($string[$i]==chr(27)) {
				$new .= "0x27";
				continue;
			}
			$new .= $string[$i];
		}
	return $new;
	}

	function getLines() {
		$handle = fopen(__DIR__."/ls.txt", "r");
		while($line = fgets($handle)) {
			$lines[] = trim($line);
		}
	return $lines;
	}

	function getLinesJustify() {
		$handle = fopen(__DIR__."/ls-justify.txt", "r");
		while($line = fgets($handle)) {
			$lines[] = trim($line);
		}
	return $lines;
	}
	
	function getString() {
		return file_get_contents(__DIR__."/ls.txt").PHP_EOL;
	}

	
	function testGetLongestStringsCount() {
		$this->model->load();
		$longest = $this->table->getLongestStrings();
		$this->assertEquals(10, $longest->count());
	}
	
	function testGetLongestStringsLength() {
		$this->model->load();
		$longest = $this->table->getLongestStrings();
		for($i=0;$i<$longest->count();$i++) {
			$array[$i] = $longest->getItem($i)->getLength();
		}
		$expect = array(10, 5, 4, 5, 5, 5, 3, 5, 7, 4);
		$this->assertEquals($expect, $array);
	}
	
	function testGetLinesZero() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[0], $csv[0]);
	}

	function testGetLinesOne() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[1], $csv[1]);
	}

	function testGetLinesTwo() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[2], $csv[2]);
	}
	
	function testGetLinesThree() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[2], $csv[2]);
	}

	function testGetLinesFour() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[4], $csv[4]);
	}

	function testGetLinesFive() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[5], $csv[5]);
	}

	function testGetLinesSix() {
		$txt = $this->getLines();
		$csv = $this->table->getLines();
		$this->assertEquals($txt[6], $csv[6]);
	}

	function testPrintTable() {
		$this->expectOutputString($this->getString());
		$this->table->printTable();
	}

	
	function testJustify() {
		$this->table->setLayout(new TerminalTableJustify());
		$txt = $this->getLinesJustify();
		$csv = $this->table->getLines();
		$this->assertEquals($txt, $csv);
	}
	
	
	function testJustifySingleCellNoColor() {
		$this->table->setLayout(new TerminalTableJustify());
		$txt = $this->getLinesJustify();
		$csv = $this->table->getLines();
		$longest = $this->table->getLongestStrings();
		$this->assertEquals(self::hex("src    "), self::hex($this->table->getCell(8, 2, $longest)));

	}
	
	function testColor() {
		$this->model->load();
		$this->table->setLayout(new TerminalTableColor());
		$longest = $this->table->getLongestStrings();
		$vtc = new VTC();
		$vtc->setForeground(VTC::GREEN);
		$this->assertEquals($vtc->getACString("src")."    ", $this->table->getCell(8, 2, $longest));
	}
	
	function testBackground() {
		$this->model->load();
		$this->table->setLayout(new TerminalTableColor());
		$longest = $this->table->getLongestStrings();
		$vtc = new VTC();
		$vtc->setBackground(VTC::GREEN);
		$this->assertEquals($vtc->getACString("README")." ", $this->table->getCell(8, 1, $longest));
	}
	
	function testAttributes() {
		$this->model->load();
		$this->table->setLayout(new TerminalTableColor());
		$longest = $this->table->getLongestStrings();
		$vtc = new VTC();
		$vtc->setAttributes(array(VTC::DIM, VTC::UNDERSCORE));
		$this->assertEquals($vtc->getACString("LICENSE"), $this->table->getCell(8, 0, $longest));
	}


}
