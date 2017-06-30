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

	public function getString()
	{
		return $this->string;
	}

	public function setString($string)
	{
		$this->string = $string;

		return $this;
	}

	public function getInt()
	{
		return $this->int;
	}

	public function setInt($int)
	{
		$this->int = $int;

		return $this;
	}

	public function getFloat()
	{
		return $this->float;
	}

	public function setFloat($float)
	{
		$this->float = $float;

		return $this;
	}

	public function getDate(): DateTime
	{
		return $this->date;
	}

	public function setDate(DateTime $date)
	{
		$this->date = $date;

		return $this;
	}


	public function getDateTime(): DateTime
	{
		return $this->dateTime;
	}

	public function setDateTime(DateTime $dateTime)
	{
		$this->dateTime = $dateTime;

		return $this;
	}

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

	public function isBoolean(): bool
	{
		return $this->boolean;
	}

	public function setBoolean($boolean)
	{
		$this->boolean = $boolean;

		return $this;
	}
}