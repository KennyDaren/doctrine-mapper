<?php
namespace DoctrineMapper\Tests\Assets;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @author  Hynek Nerad <iam@kennydaren.me>
 * @package DoctrineMapper\Tests
 */
class TestEntity {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @var string
	 */
	protected $id;
	/**
	 * @ORM\Column(name="string")
	 * @var string
	 */
	protected $string;

	/**
	 * @ORM\Column(name="int", type="integer")
	 * @var int
	 */
	protected $int;

	/**
	 * @ORM\Column(name="float", type="float")
	 * @var float
	 */
	protected $float;

	/**
	 * @ORM\Column(name="date", type="datetime")
	 * @var DateTime
	 */
	protected $date;

	/**
	 * @ORM\Column(name="datetime", type="datetime")
	 * @var DateTime
	 */
	protected $dateTime;

	/**
	 * @ORM\Column(name="boolean", type="boolean")
	 * @var  boolean
	 */
	protected $boolean;

	/**
	 * @ORM\Column(name="defaultToNull", type="integer", nullable=TRUE)
	 * @var  integer
	 */
	protected $defaultToNull = 8;

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return TestEntity
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getString(): string
	{
		return $this->string;
	}

	/**
	 * @param string $string
	 *
	 * @return TestEntity
	 */
	public function setString($string)
	{
		$this->string = $string;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getInt(): int
	{
		return $this->int;
	}

	/**
	 * @param int $int
	 *
	 * @return TestEntity
	 */
	public function setInt($int)
	{
		$this->int = $int;

		return $this;
	}

	/**
	 * @return float
	 */
	public function getFloat(): float
	{
		return $this->float;
	}

	/**
	 * @param float $float
	 *
	 * @return TestEntity
	 */
	public function setFloat($float)
	{
		$this->float = $float;

		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDate(): DateTime
	{
		return $this->date;
	}

	/**
	 * @param DateTime $date
	 *
	 * @return TestEntity
	 */
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDateTime(): DateTime
	{
		return $this->dateTime;
	}

	/**
	 * @param DateTime $dateTime
	 *
	 * @return TestEntity
	 */
	public function setDateTime($dateTime)
	{
		$this->dateTime = $dateTime;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isBoolean(): bool
	{
		return $this->boolean;
	}

	/**
	 * @param bool $boolean
	 *
	 * @return TestEntity
	 */
	public function setBoolean($boolean)
	{
		$this->boolean = $boolean;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getDefaultToNull(): ?int
	{
		return $this->defaultToNull;
	}

	/**
	 * @param int $defaultToNull
	 *
	 * @return TestEntity
	 */
	public function setDefaultToNull($defaultToNull)
	{
		$this->defaultToNull = $defaultToNull;

		return $this;
	}
}