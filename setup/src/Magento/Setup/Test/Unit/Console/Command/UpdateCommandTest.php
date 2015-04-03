<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Setup\Test\Unit\Console\Command;

use Magento\Setup\Console\Command\UpdateCommand;
use Symfony\Component\Console\Tester\CommandTester;

class UpdateCommandTest  extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $installerFactory = $this->getMock('Magento\Setup\Model\InstallerFactory', [], [], '', false);
        $installer = $this->getMock('Magento\Setup\Model\Installer', [], [], '', false);
        $installer->expects($this->at(0))->method('updateModulesSequence');
        $installer->expects($this->at(1))->method('installSchema');
        $installer->expects($this->at(2))->method('installDataFixtures');
        $installerFactory->expects($this->once())->method('create')->willReturn($installer);
        $commandTester = new CommandTester(new UpdateCommand($installerFactory));
        $commandTester->execute([]);
    }
}