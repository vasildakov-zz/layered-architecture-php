<?php
namespace Infrastructure\Doctrine;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Doctrine\Common\Cache\ArrayCache;
use Interop\Container\ContainerInterface;

#use Infrastructure\Persistence\Doctrine\Type\IsbnType;

/**
 * Class EntityManagerFactory
 */
final class EntityManagerFactory
{
    /**
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(ContainerInterface $container): EntityManager
    {
        $doctrineConfig = $container->has('config')
                        ? $container->get('config')['doctrine']
                        : [];

        $config = new Configuration();

        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyDir('data/doctrine/proxies');
        $config->setProxyNamespace('Domain\Entity');

        $config->setMetadataDriverImpl(new XmlDriver([
            __DIR__ . '/../../Persistence/Doctrine/Mapping'
        ]));

        $config->setNamingStrategy(new UnderscoreNamingStrategy());
        $config->setQueryCacheImpl(new ArrayCache());
        $config->setMetadataCacheImpl(new ArrayCache());

        $em = EntityManager::create(
            $doctrineConfig['connection']['orm_default']['params'],
            $config
        );

        //Add custom DDD types to map ValueObjects correctly
        /*if (!\Doctrine\DBAL\Types\Type::hasType('isbn')) {
             \Doctrine\DBAL\Types\Type::addType('isbn', IsbnType::class);

            $entityManager->getConnection()
                          ->getDatabasePlatform()
                          ->registerDoctrineTypeMapping('isbn', 'isbn');
        } */

        return $em;
    }
}