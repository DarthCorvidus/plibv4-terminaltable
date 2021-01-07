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
class TerminalTableDemoTest extends TestCase {
	private $model;
	function setUp() {
		$this->model = new TerminalTableDemo();
		$this->model->load();
	}
	
	function testGetColumns() {
		$this->assertEquals(10, $this->model->getColumns());
	}
	
	function testGetRows() {
		$this->assertEquals(6, $this->model->getRows());
	}
	
	function testGetCell() {
		$this->assertEquals("-rwxr--r--", $this->model->getCell(0, 4));
	}
	
	function testGetTitle() {
		$this->assertEquals("Links", $this->model->getTitle(1));
	}

}
