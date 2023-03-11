<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\AutoReview;

use JsonException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 *
 * @group AutoReview
 */
final class ComposerJsonTest extends TestCase
{
    private array $devComposer;
    private array $frameworkComposer;
    private array $starterComposer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->devComposer       = $this->getComposerJson(dirname(__DIR__, 3) . '/composer.json');
        $this->frameworkComposer = $this->getComposerJson(dirname(__DIR__, 3) . '/admin/framework/composer.json');
        $this->starterComposer   = $this->getComposerJson(dirname(__DIR__, 3) . '/admin/starter/composer.json');
    }

    public function testFrameworkRequireIsTheSameWithDevRequire(): void
    {
        $this->checkFramework('require');
    }

    public function testFrameworkRequireDevIsTheSameWithDevRequireDev(): void
    {
        $devRequireDev = $this->devComposer['require-dev'];
        $fwRequireDev  = $this->frameworkComposer['require-dev'];

        foreach ($devRequireDev as $dependency => $expectedVersion) {
            if (! isset($fwRequireDev[$dependency])) {
                $this->addToAssertionCount(1);

                continue;
            }

            $this->assertSame($expectedVersion, $fwRequireDev[$dependency], sprintf(
                'Framework\'s "%s" dev dependency is expected to have version constraint of "%s", found "%s" instead.' .
                "\nPlease update the version constraint at %s.",
                $dependency,
                $expectedVersion,
                $fwRequireDev[$dependency],
                clean_path(dirname(__DIR__, 2) . '/admin/framework/composer.json')
            ));
        }
    }

    public function testFrameworkSuggestIsTheSameWithDevSuggest(): void
    {
        $this->checkFramework('suggest');
    }

    public function testFrameworkConfigIsTheSameWithDevSuggest(): void
    {
        $this->checkFramework('config');
    }

    public function testStarterConfigIsTheSameWithDevSuggest(): void
    {
        $this->checkStarter('config');
    }

    private function checkFramework(string $section): void
    {
        $this->assertSame(
            $this->devComposer[$section],
            $this->frameworkComposer[$section],
            'The framework\'s "' . $section . '" section is not updated with the main composer.json.'
        );
    }

    private function checkStarter(string $section): void
    {
        $this->assertSame(
            $this->devComposer[$section],
            $this->starterComposer[$section],
            'The starter\'s "' . $section . '" section is not updated with the main composer.json.'
        );
    }

    private function getComposerJson(string $path): array
    {
        try {
            return json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $this->fail(sprintf(
                'The composer.json at "%s" is not readable or does not exist. Error was "%s".',
                clean_path($path),
                $e->getMessage()
            ));
        }
    }
}
