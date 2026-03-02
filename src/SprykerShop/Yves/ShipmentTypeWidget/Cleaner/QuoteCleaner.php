<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ShipmentTypeWidget\Cleaner;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class QuoteCleaner implements QuoteCleanerInterface
{
    public function cleanShipmentTypeUuidFromQuoteItems(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            if (!$itemTransfer->getShipment()) {
                continue;
            }
            $itemTransfer->getShipmentOrFail()->setShipmentTypeUuid(null);

            $this->cleanShipmentTypeFromItemShipmentMethod($itemTransfer);
        }

        return $quoteTransfer;
    }

    protected function cleanShipmentTypeFromItemShipmentMethod(ItemTransfer $itemTransfer): void
    {
        if (!$itemTransfer->getShipmentOrFail()->getMethod() || !$itemTransfer->getShipmentOrFail()->getMethodOrFail()->getShipmentType()) {
            return;
        }

        $itemTransfer->getShipmentOrFail()->getMethodOrFail()->setShipmentType(null);
    }
}
