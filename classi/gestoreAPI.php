<?php
final class gestoreAPI
{

    function searchByName($name)
    {

        $url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . $name;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchByIngredient($ingredient)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=" . $ingredient;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchByCategory($category)
    {

        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . $category;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchByGlass($glass)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?g=" . $glass;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchByAlcoholic($alcoholic)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=" . $alcoholic;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchByFirstLetter($letter)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?f=" . $letter;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchById($id)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" . $id;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchRandom()
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/random.php";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchIngredientById($id)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?iid=" . $id;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchList($type)
    {
        $url = "https://www.thecocktaildb.com/api/json/v1/1/list.php?" . $type . "=list";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function searchDrinkThumbnails($id)
    {
        $url = "https://www.thecocktaildb.com/images/media/drink/" . $id . ".jpg";
        return $url;
    }

    function searchIngredientThumbnails($ingredient)
    {
        $url = "https://www.thecocktaildb.com/images/ingredients/" . $ingredient . "-small.png";
        return $url;
    }

    function searchIngredientThumbnailsMedium($ingredient)
    {
        $url = "https://www.thecocktaildb.com/images/ingredients/" . $ingredient . "-medium.png";
        return $url;
    }
    
    function searchIngredientThumbnailsLarge($ingredient)
    {
        $url = "https://www.thecocktaildb.com/images/ingredients/" . $ingredient . ".png";
        return $url;
    }
    function searchDrinkThumbnailsSmall($id)
    {
        $url = "https://www.thecocktaildb.com/images/media/drink/" . $id . "/small.jpg";
        return $url;
    }


}

?>