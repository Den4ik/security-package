<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\NotifierAdminUi\Model\Source\Channel;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\NotifierApi\Api\AdapterPoolInterface;

class Adapter implements OptionSourceInterface
{
    /**
     * @var AdapterPoolInterface
     */
    private $adapterRepository;

    /**
     * Adapter constructor.
     * @param AdapterPoolInterface $adapterRepository
     */
    public function __construct(
        AdapterPoolInterface $adapterRepository
    ) {
        $this->adapterRepository = $adapterRepository;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray(): array
    {
        $adapters = $this->adapterRepository->getAdapters();

        $res = [];
        foreach ($adapters as $adapter) {
            $res[] = [
                'value' => $adapter->getCode(),
                'label' => $adapter->getDescription(),
            ];
        }

        return $res;
    }
}
