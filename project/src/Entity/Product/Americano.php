<?php

namespace src\Entity\Product;

use src\Entity\BaseIngredient;
use src\Entity\BaseProduct;
use src\Entity\Ingredient\Coffee;
use src\Entity\Ingredient\Sugar;
use src\Entity\Ingredient\Water;

class Americano extends BaseProduct
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME_AMERICANO;
    }

    /**
     * @return array
     */
    public function getReceiptIngredients(): array
    {
        $ingredients = [
            BaseIngredient::NAME_COFFEE => Coffee::class,
            BaseIngredient::NAME_WATER => Water::class,
        ];
        if($this->getOptionalParams() == "s"){
            $ingredients[BaseIngredient::NAME_SUGAR] = Sugar::class;
        }
        return $ingredients;
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
        $this->addIngredient(BaseIngredient::NAME_WATER, Water::class);
        $this->addIngredient(BaseIngredient::NAME_COFFEE, Coffee::class);
        if($this->getOptionalParams() == "s"){
            $this->addIngredient(BaseIngredient::NAME_SUGAR, Sugar::class);
        }
    }

}
