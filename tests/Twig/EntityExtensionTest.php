<?php
/*
 * This file is part of Part-DB (https://github.com/Part-DB/Part-DB-symfony).
 *
 *  Copyright (C) 2019 - 2022 Jan Böhmer (https://github.com/jbtronics)
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published
 *  by the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Tests\Twig;

use App\Entity\Attachments\PartAttachment;
use App\Entity\ProjectSystem\Project;
use App\Entity\LabelSystem\LabelProfile;
use App\Entity\Parts\Category;
use App\Entity\Parts\Footprint;
use App\Entity\Parts\Manufacturer;
use App\Entity\Parts\MeasurementUnit;
use App\Entity\Parts\Part;
use App\Entity\Parts\Storelocation;
use App\Entity\Parts\Supplier;
use App\Entity\PriceInformations\Currency;
use App\Entity\UserSystem\Group;
use App\Entity\UserSystem\User;
use App\Twig\EntityExtension;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EntityExtensionTest extends WebTestCase
{
    /** @var EntityExtension */
    protected $service;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        //Get a service instance.
        self::bootKernel();
        $this->service = self::getContainer()->get(EntityExtension::class);
    }

    public function testGetEntityType(): void
    {
        $this->assertEquals('part', $this->service->getEntityType(new Part()));
        $this->assertEquals('footprint', $this->service->getEntityType(new Footprint()));
        $this->assertEquals('storelocation', $this->service->getEntityType(new Storelocation()));
        $this->assertEquals('manufacturer', $this->service->getEntityType(new Manufacturer()));
        $this->assertEquals('category', $this->service->getEntityType(new Category()));
        $this->assertEquals('device', $this->service->getEntityType(new Project()));
        $this->assertEquals('attachment', $this->service->getEntityType(new PartAttachment()));
        $this->assertEquals('supplier', $this->service->getEntityType(new Supplier()));
        $this->assertEquals('user', $this->service->getEntityType(new User()));
        $this->assertEquals('group', $this->service->getEntityType(new Group()));
        $this->assertEquals('currency', $this->service->getEntityType(new Currency()));
        $this->assertEquals('measurement_unit', $this->service->getEntityType(new MeasurementUnit()));
        $this->assertEquals('label_profile', $this->service->getEntityType(new LabelProfile()));
    }

}
