<?php

namespace unusorin\PushBullet;

/**
 * Class Device
 *
 * @package unusorin\PushBullet
 * @since   0.1
 */
class Device
{
    /**
     * @var \stdClass
     */
    private $data;

    /**
     * @var DataProvider
     */
    private $dataProvider;

    /**
     * Constructor
     *
     * @param \stdClass    $data
     * @param DataProvider $dataProvider
     */
    public function __construct(\stdClass $data, DataProvider $dataProvider)
    {
        $this->data         = $data;
        $this->dataProvider = $dataProvider;
    }

    /**
     * Get device id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->data->id;
    }

    /**
     * Get device extras
     *
     * @return \stdClass
     */
    public function getExtras()
    {
        return $this->data->extras;
    }

    /**
     * Send note to device
     *
     * @param string $title
     * @param string $body
     *
     * @return bool
     */
    public function sendNote($title, $body)
    {
        try {
            $this->dataProvider->post(
                'pushes',
                [
                    'type'      => 'note',
                    'device_id' => $this->getId(),
                    'title'     => $title,
                    'body'      => $body
                ]
            );
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Send link to device
     *
     * @param string $title
     * @param string $link
     *
     * @return bool
     */
    public function sendLink($title, $link)
    {
        try {
            $this->dataProvider->post(
                'pushes',
                [
                    'type'      => 'link',
                    'device_id' => $this->getId(),
                    'title'     => $title,
                    'link'      => $link
                ]
            );
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Send address to device
     *
     * @param string $title
     * @param string $address
     *
     * @return bool
     */
    public function sendAddress($title, $address)
    {
        try {
            $this->dataProvider->post(
                'pushes',
                [
                    'type'      => 'address',
                    'device_id' => $this->getId(),
                    'title'     => $title,
                    'address'   => $address
                ]
            );
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    //TODO: implement list
    //TODO: implement files
}
