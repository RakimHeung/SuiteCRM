<?PHP

class FavoritesTest extends PHPUnit_Framework_TestCase
{
    public function testFavorites()
    {

        //execute the contructor and check for the Object type and  attributes
        $favorites = new Favorites();
        $this->assertInstanceOf('Favorites', $favorites);
        $this->assertInstanceOf('Basic', $favorites);
        $this->assertInstanceOf('SugarBean', $favorites);

        $this->assertAttributeEquals('Favorites', 'module_dir', $favorites);
        $this->assertAttributeEquals('Favorites', 'object_name', $favorites);
        $this->assertAttributeEquals('favorites', 'table_name', $favorites);
        $this->assertAttributeEquals(true, 'new_schema', $favorites);
    }

    public function testdeleteFavorite()
    {
        error_reporting(E_ERROR | E_PARSE);

        $favorites = new Favorites();

        //test without any ID. testing with an invalid ID will throw fatal error
        $result = $favorites->deleteFavorite();
        $this->assertEquals(false, $result);
    }

    public function testgetFavoriteID()
    {
        $favorites = new Favorites();

        //test with blank string parameters
        $result = $favorites->getFavoriteID('', '');
        $this->assertEquals(false, $result);

        //test with string parameters
        $result = $favorites->getFavoriteID('Accounts', '1');
        $this->assertEquals(false, $result);
    }

    public function testgetCurrentUserSidebarFavorites()
    {
        $favorites = new Favorites();

        //test with empty string parameter
        $result = $favorites->getCurrentUserSidebarFavorites();
        $this->assertTrue(is_array($result));

        //test with string
        $result = $favorites->getCurrentUserSidebarFavorites('1');
        $this->assertTrue(is_array($result));
    }
}
