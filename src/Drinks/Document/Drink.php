<?php

namespace Drinks\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Drinks\Document\Consumption;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Drink class.
 *
 * @author Benjamin Grandfond <benjamin.grandfond@gmail.com>
 * @ODM\Document(repositoryClass="Drinks\Repository\DrinkRepository")
 */
class Drink
{
    /** @ODM\Id */
    private $id;

    /**
     * @ODM\String
     */
    private $name;

    /**
     * @ODM\String
     */
    private $logo;

    /**
     * Store the price in cents, divide by 100 to have the real price
     *
     * @ODM\Integer
     */
    private $purchasePrice;

    /**
     * Store the price in cents, divide by 100 to have the real price
     *
     * @ODM\Integer
     */
    private $salePrice;

    /**
     * @ODM\Integer
     */
    private $quantity;

    /**
     * @ODM\ReferenceMany(targetDocument="Drinks\Document\Consumption", mappedBy="drink")
     */
    private $consumptions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->consumptions = new ArrayCollection();
    }

    /**
     * @param array $consumptions
     */
    public function setConsumptions($consumptions)
    {
        $this->consumptions = $consumptions;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getConsumptions()
    {
        return $this->consumptions;
    }

    /**
     * @param $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $purchasePrice
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;
    }

    /**
     * @return integer
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * @param $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $salePrice
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
    }

    /**
     * @return integer
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @return String
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Integer
     */
    public function getId()
    {
        return $this->id;
    }
}