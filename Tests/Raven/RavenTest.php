<?php
use Symfony\Component\HttpKernel\Kernel;

require_once __DIR__ . '/../TestKernel.php';

/**
 * RavenTest
 */
class RavenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Kunstmaan\SentryBundle\Raven\Raven
     */
    public function testRavenClient()
    {
        $kernel = new \TestKernel('test', false);
        $environment = $kernel->getEnvironment();
        $raven = new \Kunstmaan\SentryBundle\Raven\Raven('http://public:secret@example.com/1', $environment);
        $this->assertEquals($raven->project, 1);
        $this->assertEquals($raven->servers, array('http://example.com/api/store/'));
        $this->assertEquals($raven->public_key, 'public');
        $this->assertEquals($raven->secret_key, 'secret');
        $this->assertEquals($raven->getEnvironment(), $environment);
    }
}
