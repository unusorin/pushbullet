<?php

namespace unusorin\PushBullet;

/**
 * Class DeviceManager
 *
 * @package unusorin\PushBullet
 * @since   0.1
 */
class DeviceManager
{
    /**
     * @var DataProvider
     */
    private $dataProvider;

    /**
     * @var Device[]
     */
    private $devices = [];

    /**
     * Constructor
     *
     * @param DataProvider $dataProvider
     * @param bool         $autoFetch
     */
    public function __construct(DataProvider $dataProvider, $autoFetch = true)
    {
        $this->dataProvider = $dataProvider;
        if ($autoFetch) {
            $this->fetchAll();
        }
    }

    /**
     * Get all devices
     */
    public function fetchAll()
    {
        $devices = json_decode($this->dataProvider->get('devices')->getBody()->__toString());

        foreach ($devices->devices as $deviceData) {
            $device                          = new Device($deviceData, $this->dataProvider);
            $this->devices[$device->getId()] = $device;
        }
    }

    /**
     * Get single device
     *
     * @param string $deviceId
     *
     * @return null|Device
     */
    public function get($deviceId)
    {
        return isset($this->devices[$deviceId]) ? $this->devices[$deviceId] : null;
    }

    /**
     * Get all available devices
     *
     * @return Device[]
     */
    public function getAll()
    {
        return $this->devices;
    }
}
