<?php
namespace DoctrineMapper\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;
use Doctrine\ORM\Tools\Setup;
use DoctrineMapper\ArrayAccessEntityMapper;
use DoctrineMapper\Parsers\Date\DateParser;
use DoctrineMapper\Parsers\Date\SimpleDateDecorator;
use DoctrineMapper\Parsers\Date\SimpleDateFormat;
use DoctrineMapper\Tests\Assets\TestEntity;
use Kdyby\Doctrine\EntityManager;
use Kdyby\Doctrine\Mapping\AnnotationDriver;
use Kdyby\Doctrine\Mapping\ClassMetadataFactory;
use Kdyby\Events\EventManager;
use PHPUnit\Framework\TestCase;

/**
 * ArrayAccessEntityMapper test case
 *
 * @covers ArrayAccessEntityMapper
 *
 * @author Hynek Nerad <iam@kennydaren.me>
 */
final class ArrayAccessEntityMapperTest extends TestCase
{
	public static function setUpBeforeClass()
	{
		require_once __DIR__ . "/Assets/TestEntity.php";
	}

	public function testSetToEntitySimpleValues(){
		$mapper = new ArrayAccessEntityMapper($this->getEmMock(), $this->createDateParser());

		$date = new \DateTime('28.11.2015');
		$dateTime = new \DateTime('2016-11-29 23:51:00');

		$values = [
			'string'    => 'ssss',
		    'int'       => 555,
		    'float'     => '0.5',
		    'date'      => '28.11.2015',
		    'dateTime'  => $dateTime,
		    'boolean'  => FALSE
		];

		$testEntity = new TestEntity();

		/** @var TestEntity $entity */
		$entity = $mapper->setToEntity($values, $testEntity, [], []);


		$this->assertEquals($values['string'], $entity->getString());
		$this->assertEquals((int)$values['int'], $entity->getInt());
		$this->assertEquals((float)$values['float'], $entity->getFloat());
		$this->assertEquals($date, $entity->getDate());
		$this->assertEquals($values['dateTime'], $entity->getDateTime());
		$this->assertEquals((bool)$values['boolean'], $entity->isBoolean());
	}

	/**
	 * @return EntityManager|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getEmMock()
	{
		$dir = __DIR__."/Asset/Entity/";
		$config = Setup::createAnnotationMetadataConfiguration(array($dir), true);

		$eventManager = new EventManager();
		$platform = new PostgreSqlPlatform(); //TODO
		$metadataFactory = new ClassMetadataFactory();
		$config->setMetadataDriverImpl(new AnnotationDriver([$dir], new AnnotationReader()));

		$connectionMock = $this->getMockBuilder('Doctrine\DBAL\Connection')
			->disableOriginalConstructor()
			->getMock();
		$connectionMock->expects($this->any())
			->method('getDatabasePlatform')
			->will($this->returnValue($platform));

		$emMock = $this->getMockBuilder(EntityManager::class)
			->disableOriginalConstructor()
			->getMock();
		$metadataFactory->setEntityManager($emMock);
		$emMock->expects($this->any())
			->method('getConfiguration')
			->will($this->returnValue($config));
		$emMock->expects($this->any())
			->method('getConnection')
			->will($this->returnValue($connectionMock));
		$emMock->expects($this->any())
			->method('getEventManager')
			->will($this->returnValue($eventManager));
		$emMock->expects($this->any())
			->method('getClassMetadata')
			->will($this->returnCallback(function($class) use ($metadataFactory){
				return $metadataFactory->getMetadataFor($class);
			}));

		return $emMock;
	}

	/**
	 * @return DateParser
	 */
	protected function createDateParser(){
		return new DateParser(new SimpleDateFormat(), new SimpleDateDecorator());
	}
}
