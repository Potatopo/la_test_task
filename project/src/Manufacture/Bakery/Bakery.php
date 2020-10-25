<?php

namespace src\Manufacture\Bakery;

use src\Entity\BaseRequest;
use src\Entity\Product\Pancake;
use src\Entity\Product\Americano;
use src\Manufacture\ManufactureInterface;

class Bakery implements ManufactureInterface
{
    public function produce(BaseRequest $request)
    {
        $dish_class = 'src\Entity\Product\\' . ucfirst($request->get_productName());
        
        if(class_exists($dish_class)){
            $dish = new $dish_class($request->get_productParams());

            $dish->cookWithIngredients();

            if($dish->isCompleted($dish->getReceiptIngredients())){
                echo ucfirst($dish->getName()) . " completed.\n";
            } else {
                echo ucfirst($dish->getName()) . " was not completed because of " . $dish->getFailReason() . "\n";
            }
        } else {
            echo "Sorry, our bakery can't make this.\n";
        }
    }
}
