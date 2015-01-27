<?php
/**
 * Created by PhpStorm.
 * User: mcfedr
 * Date: 1/27/15
 * Time: 15:17
 */

namespace AppShed\Remote\HTML;

use AppShed\Remote\Element\Item\Marker;
use AppShed\Remote\Element\Screen\Map;
use AppShed\Remote\Element\Screen\Screen;
use malkusch\phpmock\phpunit\PHPMock;

class RemoteTest extends \PHPUnit_Framework_TestCase
{
    use PHPMock;

    /**
     * @dataProvider screenProvider
     */
    public function testGetResponse(Screen $screen)
    {
        $remote = new Remote($screen);
        $response = $remote->getResponse(null, false, true);

        $this->assertNotEmpty($response);

        $data = json_decode($response, true);
        $this->assertInternalType('array', $data);
    }

    /**
     * @dataProvider screenProvider
     */
    public function testHeaderResponse(Screen $screen)
    {
        $header = $this->getFunctionMock(__NAMESPACE__, 'header');
        $header->expects($this->once())
            ->with($this->equalTo('Content-type: application/json'));

        $remote = new Remote($screen);
        $remote->getResponse(null, true, true);
    }

    public function screenProvider()
    {
        $screen = new Map('Map Screen');
        $screen->addChild(new Marker('Hi there', 'hello', 32, 49));

        return [
            [$screen]
        ];
    }
}
