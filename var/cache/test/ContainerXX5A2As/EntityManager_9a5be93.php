<?php

namespace ContainerXX5A2As;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder56d05 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer16097 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesec453 = [
        
    ];

    public function getConnection()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getConnection', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getMetadataFactory', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getExpressionBuilder', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'beginTransaction', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getCache', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getCache();
    }

    public function transactional($func)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'transactional', array('func' => $func), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->transactional($func);
    }

    public function commit()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'commit', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->commit();
    }

    public function rollback()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'rollback', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getClassMetadata', array('className' => $className), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'createQuery', array('dql' => $dql), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'createNamedQuery', array('name' => $name), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'createQueryBuilder', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'flush', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'clear', array('entityName' => $entityName), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->clear($entityName);
    }

    public function close()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'close', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->close();
    }

    public function persist($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'persist', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'remove', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'refresh', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'detach', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'merge', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getRepository', array('entityName' => $entityName), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'contains', array('entity' => $entity), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getEventManager', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getConfiguration', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'isOpen', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getUnitOfWork', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getProxyFactory', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'initializeObject', array('obj' => $obj), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'getFilters', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'isFiltersStateClean', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'hasFilters', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return $this->valueHolder56d05->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer16097 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder56d05) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder56d05 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder56d05->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__get', ['name' => $name], $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        if (isset(self::$publicPropertiesec453[$name])) {
            return $this->valueHolder56d05->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56d05;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder56d05;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56d05;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder56d05;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__isset', array('name' => $name), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56d05;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder56d05;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__unset', array('name' => $name), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56d05;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder56d05;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__clone', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        $this->valueHolder56d05 = clone $this->valueHolder56d05;
    }

    public function __sleep()
    {
        $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, '__sleep', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;

        return array('valueHolder56d05');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer16097 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer16097;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer16097 && ($this->initializer16097->__invoke($valueHolder56d05, $this, 'initializeProxy', array(), $this->initializer16097) || 1) && $this->valueHolder56d05 = $valueHolder56d05;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder56d05;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder56d05;
    }


}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
