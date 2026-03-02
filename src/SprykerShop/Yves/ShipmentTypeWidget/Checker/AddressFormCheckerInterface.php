<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ShipmentTypeWidget\Checker;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Symfony\Component\Form\FormInterface;

interface AddressFormCheckerInterface
{
    public function isDeliverToMultipleAddresses(FormInterface $form): bool;

    public function isApplicableForShipmentTypeAddressStepFormHydration(?AbstractTransfer $data): bool;
}
