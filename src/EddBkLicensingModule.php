<?php

namespace RebelCode\EddBookings\Licensing;

use Dhii\Config\ConfigFactoryInterface;
use Dhii\Data\Container\ContainerFactoryInterface;
use Dhii\Event\EventFactoryInterface;
use Dhii\Exception\InternalException;
use Dhii\Util\Normalization\NormalizeStringableCapableTrait;
use Psr\Container\ContainerInterface;
use Psr\EventManager\EventManagerInterface;
use RebelCode\Modular\Module\AbstractBaseModule;
use Dhii\Util\String\StringableInterface as Stringable;
use Traversable;

/**
 * The main module class for the EDD Bookings licensing module.
 *
 * @since [*next-version*]
 */
class EddBkLicensingModule extends AbstractBaseModule
{
    /* @since [*next-version*] */
    use NormalizeStringableCapableTrait;

    /**
     * The path to the config file.
     *
     * @since [*next-version*]
     *
     * @var string|Stringable
     */
    protected $configFilePath;

    /**
     * The path to the services file.
     *
     * @since [*next-version*]
     *
     * @var string|Stringable
     */
    protected $servicesFilePath;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable                 $key                       The module key.
     * @param string[]|Stringable[]|Traversable $dependencies              The module's dependencies.
     * @param string|Stringable                 $configFilePath            The path to the module's config file.
     * @param string|Stringable                 $servicesFilePath          The path to the module's services file.
     * @param ContainerFactoryInterface         $containerFactory          The container factory instance.
     * @param ContainerFactoryInterface         $compositeContainerFactory The composite container factory instance.
     * @param ConfigFactoryInterface            $configFactory             The config factory instance.
     * @param EventManagerInterface             $eventManager              The event manager instance.
     * @param EventFactoryInterface             $eventFactory              The event factory instance.
     */
    public function __construct(
        $key,
        $dependencies,
        $configFilePath,
        $servicesFilePath,
        ContainerFactoryInterface $containerFactory,
        ContainerFactoryInterface $compositeContainerFactory,
        ConfigFactoryInterface $configFactory,
        EventManagerInterface $eventManager,
        EventFactoryInterface $eventFactory
    ) {
        $this->_initModule($key, $dependencies, $configFactory, $containerFactory, $compositeContainerFactory);
        $this->_initModuleEvents($eventManager, $eventFactory);
        $this->_setConfigFilePath($configFilePath);
        $this->_setServicesFilePath($servicesFilePath);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @throws InternalException If failed to load the config or services from their respective files.
     */
    public function setup()
    {
        return $this->_setupContainer(
            $this->_loadPhpConfigFile($this->_getConfigFilePath()),
            $this->_loadPhpConfigFile($this->_getServicesFilePath())
        );
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function run(ContainerInterface $c = null)
    {
        if ($c === null) {
            return;
        }
    }

    /**
     * Retrieves the path to the module's config file.
     *
     * @since [*next-version*]
     *
     * @return string|Stringable The path to the module's config file.
     */
    protected function _getConfigFilePath()
    {
        return $this->configFilePath;
    }

    /**
     * Sets the path to the module's config file.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable $configFilePath The path to the module's config file.
     */
    protected function _setConfigFilePath($configFilePath)
    {
        $this->configFilePath = $this->_normalizeStringable($configFilePath);
    }

    /**
     * Retrieves the path to the module's services file.
     *
     * @since [*next-version*]
     *
     * @return string|Stringable The path to the module's services file.
     */
    protected function _getServicesFilePath()
    {
        return $this->servicesFilePath;
    }

    /**
     * Sets the path to the module's services file.
     *
     * @since [*next-version*]
     *
     * @param string|Stringable $servicesFilePath The path to the module's services file.
     */
    protected function _setServicesFilePath($servicesFilePath)
    {
        $this->servicesFilePath = $this->_normalizeStringable($servicesFilePath);
    }
}
