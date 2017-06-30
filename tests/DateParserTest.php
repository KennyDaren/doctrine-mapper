<?php
use DoctrineMapper\Parsers\Date\DateParser;
use DoctrineMapper\Parsers\Date\SimpleDateDecorator;
use DoctrineMapper\Parsers\Date\SimpleDateFormat;
use PHPUnit\Framework\TestCase;

/**
 * DateParser test case
 *
 * @covers \DoctrineMapper\Parsers\Date\DateParser
 *
 * @author Hynek Nerad <iam@kennydaren.me>
 */
final class DateParserTest extends TestCase
{
	public function testCanBeParsedStringToDateTime(): void
	{
		$dateParser = $this->createDateParser();

		$dateTime = new DateTime('2017-06-17 23:51:00');
		$this->assertEquals($dateParser->parseString($dateTime), '17.06.2017 23:51:00');
	}

	public function testInvalidParseDateTimeArgument(): void
	{
		$dateParser = $this->createDateParser();

		$this->expectException(\DoctrineMapper\Exception\CantParseException::class);
		$dateParser->parseDateTime('2017-06-17 23:51:00');
	}

	public function testCanBeParsedDateTimeToString(): void
	{
		$dateParser = $this->createDateParser();

		$dateTime = new DateTime('2017-06-17 23:51:00');
		$this->assertEquals($dateParser->parseDateTime('17.6.2017 23:51:00'), $dateTime, 'Returned DateTime is not same');
	}

	public function testCanBeParsedDateToString(): void
	{
		$dateParser = $this->createDateParser();

		$dateTime = new DateTime('2017-06-17 00:00:00');
		$this->assertEquals($dateParser->parseDateTime('17.6.2017 23:51:00', TRUE), $dateTime);
	}

	protected function createDateParser(): DateParser
	{
		$dateFormat = new SimpleDateFormat();
		$decorator = new SimpleDateDecorator();

		return new DateParser($dateFormat, $decorator);
	}
}