<?php

require_once("Models/Database.php");

class Attribute{

    protected $developer=array(), $publisher=array(), $platforms=array(), $categories=array(), $genres=array(), $tags=array();

    public function __construct($id) {
        $_dbInstance = Database::getInstance();
        $_dbHandle = $_dbInstance->getdbConnection();

        $sqlQuery = 'SELECT "developer" AS AttributeName, devName AS AttributeValue FROM developers_connector JOIN developers ON developers.devID = developers_connector.devID WHERE appID = :id 
                    UNION
                    SELECT "publisher" AS AttributeName, publisherName AS AttributeValue FROM publishers_connector JOIN publishers ON publishers.publisherID = publishers_connector.publisherID WHERE appID = :id 
                    UNION
                    SELECT "platforms" AS AttributeName, platformName AS AttributeValue FROM platforms_connector JOIN platforms ON platforms.platformID = platforms_connector.platformID WHERE appID = :id 
                    UNION
                    SELECT "categories" AS AttributeName, categoryName AS AttributeValue FROM categories_connector JOIN categories ON categories.categoryID = categories_connector.categoryID WHERE appID = :id 
                    UNION
                    SELECT "genres" AS AttributeName, genreName AS AttributeValue FROM genres_connector JOIN genres ON genres.genreID = genres_connector.genreID WHERE appID = :id 
                    UNION
                    SELECT "tags" AS AttributeName, tagName AS AttributeValue FROM tags_connector JOIN tags ON tags.tagID = tags_connector.tagID WHERE appID = :id';
        $statement = $_dbHandle->prepare($sqlQuery);
        $statement->execute(['id' => $id]);
        $attributeList = $statement->fetchAll();
        foreach ($attributeList as $row) {
            $this->{$row["AttributeName"]}[] = $row['AttributeValue'];
        }
    }

    function getDeveloper() {
        return $this->developer;
    }

    function getPublisher() {
        return $this->publisher;
    }

    function getPlatforms() {
        return $this->platforms;
    }

    function getCategories() {
        return $this->categories;
    }

    function getGenres() {
        return $this->genres;
    }

    function getTags() {
        return $this->tags;
    }

}
