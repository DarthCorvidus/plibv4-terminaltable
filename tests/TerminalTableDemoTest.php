<?php
declare(strict_types=1);
namespace plibv4\terminaltable;
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
final class TerminalTableDemoTest extends TestCase {
	/** @psalm-suppress PropertyNotSetInConstructor */
	private TerminalTableModel $model;
	#[\Override]
	function setUp(): void {
		$this->model = new TerminalTableDemo();
		$this->model->load();
	}
	
	function testGetColumns(): void {
		$this->assertEquals(10, $this->model->getColumns());
	}
	
	function testGetRows(): void {
		$this->assertEquals(6, $this->model->getRows());
	}
	
	function testGetCell(): void {
		$this->assertEquals("-rwxr--r--", $this->model->getCell(0, 4));
	}
	
	function testGetTitle(): void {
		$this->assertEquals("Links", $this->model->getTitle(1));
	}

}
