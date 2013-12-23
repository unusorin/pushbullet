#PushBullet PHP SDK

Install it via composer:

    "require":
        {
            "sorin/pushbullet":"dev-master"
        }

and use it:

    <?php
    use unusorin\PushBullet\DataProvider;
    use unusorin\PushBullet\DeviceManager;

    require_once 'vendor/autoload.php';

    $deviceManager = new DeviceManager(
        new DataProvider('YOUR_API_KEY')
    );

    $nexus4 = $deviceManager->get('YOUR_DEVICE_ID');
    //getAll to return all available devices

    var_dump($nexus4->sendNote('Ubuntu server', 'Crash'));
    //also available: sendLink, sendAddress
    //sendFile & sendList available soon