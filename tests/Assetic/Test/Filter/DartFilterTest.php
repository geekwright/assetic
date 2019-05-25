<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Test\Filter;

use Assetic\Asset\StringAsset;
use Assetic\Filter\DartFilter;

/**
 * @group integration
 */
class DartFilterTest extends FilterTestCase
{
    private $filter;

    protected function setUp()
    {
        if (!$dartBin = $this->findExecutable('dart2js', 'DART_BIN')) {
            $this->markTestSkipped('Unable to find `dart2js` executable.');
        }

        $this->filter = new DartFilter($dartBin);
    }

    protected function tearDown()
    {
        $this->filter = null;
    }

    public function testFilterLoad()
    {
        $input = <<<EOM
void main() {
  print('Hello, World!');
}
EOM;

        $asset = new StringAsset($input);
        $asset->load();

        $this->filter->filterLoad($asset);

        $this->assertContains(
            '//# sourceMappingURL=assetic_dart',
            $asset->getContent()
        );
    }
}
