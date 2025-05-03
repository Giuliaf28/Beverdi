<?php
final class gestoreRicetta{
    function getNomeCocktail($datascocktail){
        return $datascocktail['drinks'][0]['strDrink'];
    }

    function getImgCocktail($datascocktail){
        return $datascocktail['drinks'][0]['strDrinkThumb'];
    }

    function getIngredientiCocktail($datascocktail){
        $ingredientiCocktail = array();
        for ($i = 0; $i < 15; $i++) {
            if ($datascocktail['drinks'][0]['strIngredient' . ($i + 1)] == null)
                break;
            $ingredientiCocktail[$i] = $datascocktail['drinks'][0]['strIngredient' . ($i + 1)];
        }
        return $ingredientiCocktail;
    }

    function getQuantitaIngredientiCocktail($datascocktail){
        $quantitaIngredientiCocktail = array();
        for ($i = 0; $i < 15; $i++) {
            if ($datascocktail['drinks'][0]['strMeasure' . ($i + 1)] == null)
                break;
            $quantitaIngredientiCocktail[$i] = $datascocktail['drinks'][0]['strMeasure' . ($i + 1)];
        }
        return $quantitaIngredientiCocktail;
    }

    function getIstruzioniCocktail($datascocktail, $lang){
        
        if($lang == 'EN')
            return $datascocktail['drinks'][0]['strInstructions'];
        else
            return $datascocktail['drinks'][0]['strInstructions'.$lang];
        }
        
   

    function getCategoriaCocktail($datascocktail){
        return $datascocktail['drinks'][0]['strCategory'];
    }
    

    function isAlcolico($datascocktail){
        return $datascocktail['drinks'][0]['strAlcoholic'];
    }

    function getBicchiere($datascocktail){
        return $datascocktail['drinks'][0]['strGlass'];
    }

    function getImgIngrediente($ingrediente){
        $ingrediente = strtolower($ingrediente);
        $url = "https://www.thecocktaildb.com/images/ingredients/".$ingrediente."-small.png";
        
        return $url;
    }

    

 }
?>