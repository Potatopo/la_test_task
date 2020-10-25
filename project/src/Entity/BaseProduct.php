<?php

namespace src\Entity;

abstract class BaseProduct
{
    const NAME_PANCAKE = 'pancake';
    const NAME_AMERICANO = 'americano';

    /** @var array */
    protected $ingredients = [], $failReason = '', $optional_params = '';

    function __construct($optional_params)
    {
        $this->optional_params = ($optional_params) ? $optional_params : '';
    }

    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return array
     */
    abstract public function getReceiptIngredients(): array;

    /**
     * 
     */
    abstract public function cookWithIngredients();

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {

        if (count($this->getReceiptIngredients()) !== count($this->ingredients)) {
            // If there are not enough array elements, we find which ones
            $this->setFailReason(implode(" and ", array_keys(array_diff_key($this->getReceiptIngredients(), $this->ingredients))) . ' were not added.');
            return false;
        }

        foreach ($this->getReceiptIngredients() as $ingredientName => $className) {
            if (!isset($this->getIngredients()[$ingredientName]) || get_class($this->getIngredients()[$ingredientName]) !== $className) {
                // There are enough elements, but some are confused
                $this->setFailReason("used something instead of " . $ingredientName . '.');
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * set ingredients
     */
    public function addIngredient($ingredient_name, $ingredient_class)
    {
        $this->ingredients[$ingredient_name] = new $ingredient_class;
    }

    /**
     * @return string
     */
    public function getFailReason(): string
    {
        return $this->failReason;
    }

    /**
     * set failReson
     */
    public function setFailReason($failReason)
    {
        $this->failReason = $failReason;
    }

    /**
     * @return string
     */
    public function getOptionalParams(): string
    {
        return $this->optional_params;
    }

}
