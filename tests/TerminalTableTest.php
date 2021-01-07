<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
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
	
	function getLines() {
		$handle = fopen("./tests/ls.txt", "r");
		while($line = fgets($handle)) {
			$lines[] = trim($line);
		}
	return $lines;
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

}
