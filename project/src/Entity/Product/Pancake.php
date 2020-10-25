<?php

namespace src\Entity\Product;

use src\Entity\BaseIngredient;
use src\Entity\BaseProduct;
use src\Entity\Ingredient\Egg;
use src\Entity\Ingredient\Flour;
use src\Entity\Ingredient\Milk;
use src\Entity\Ingredient\Sugar;
use src\Entity\Ingredient\Water;

class Pancake extends BaseProduct
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME_PANCAKE;
    }

    /**
     * @return array
     */
    public function getReceiptIngredients(): array
    {
        return [
            BaseIngredient::NAME_MILK => Milk::class,
            BaseIngredient::NAME_EGG => Egg::class,
            BaseIngredient::NAME_WATER => Water::class,
            BaseIngredient::NAME_FLOUR => Flour::class,
            BaseIngredient::NAME_SUGAR => Sugar::class,
        ];
    }

    /**
     * take ingredients from receipt and add it to ingredients array
     */
    public function cookWithIngredients()
    {
        //We can take ingredients from the array
        // foreach($this->getReceiptIngredients() as $ingredientName => $className){
        //     $this->addIngredient($ingredientName, $className);
        // }

        //Or add it manually one by one
        $this->addIngredient(BaseIngredient::NAME_MILK, Milk::class);
        $this->addIngredient(BaseIngredient::NAME_EGG, Egg::class);
        $this->addIngredient(BaseIngredient::NAME_WATER, Water::class);
        $this->addIngredient(BaseIngredient::NAME_FLOUR, Flour::class);
        $this->addIngredient(BaseIngredient::NAME_SUGAR, Sugar::class);
    }

}
