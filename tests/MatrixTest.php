<?php
declare(strict_types=1);
namespace plibv4\terminaltable;
use PHPUnit\Framework\TestCase;
use OutOfBoundsException;
class MatrixTest extends TestCase {
	function testConstruct() {
		$matrix = new Matrix();
		$this->assertInstanceOf(Matrix::class, $matrix);
		$this->assertSame(0, $matrix->getColumns());
		$this->assertSame(0, $matrix->getRows());
	}

	/**
	 * @dataProvider putProvider
	 * @return void
	 */
	function testPut(int $row, int $column, string $value): void {
		$matrix = new Matrix();
		$matrix->put($row, $column, $value);
		$this->assertSame($row+1, $matrix->getRows());
		$this->assertSame($column+1, $matrix->getColumns());
		$this->assertSame($value, $matrix->get($row, $column));
	}

	/**
	 * @dataProvider putProvider
	 * @return void
	 */
	function testClear(int $row, int $column, string $value): void {
		$matrix = new Matrix();
		$matrix->put($row, $column, $value);
		$matrix->clear();
		$this->assertSame(0, $matrix->getRows());
		$this->assertSame(0, $matrix->getColumns());
	}
	
	function putProvider(): array {
		return [
			[0, 0, "Dog"],
			[7, 14, "Cat"],
			[12, 3, "Cat"],
		];
	}
	
	function testGetEmpty(): void {
		$matrix = new Matrix();
		$matrix->put(5, 3, "Dog");
		$this->assertSame("", $matrix->get(0, 0));
	}

	/**
	 * @dataProvider putProvider
	 * @return void
	 */
	function testGetOutOfBoundsRows(int $row, int $column, string $value): void {
		$matrix = new Matrix();
		$matrix->put($row, $column, $value);
		$this->expectException(OutOfBoundsException::class);
		$this->assertSame("", $matrix->get($row+1, $column));
	}

	/**
	 * @dataProvider oobProvider
	 * @return void
	 */
	function testOutOfBounds(int $row, int $column): void {
		$matrix = new Matrix();
		$matrix->put(3, 5, "Dog");
		$this->expectException(OutOfBoundsException::class);
		$this->assertSame("", $matrix->get($row, $column));
	}

	function oobProvider() {
		return [
			[3, 6],
			[4, 5],
			[4, 6],
			[-1, 0],
			[0, -1],
			[-1, -1],
		];
	}
}