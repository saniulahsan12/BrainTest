<?php

require_once('class/DBClass.php');
require_once('helpers.php');

class BrainTest
{
    function __construct()
    {
        $this->dbClass = new DBClass;
    }

    function solve1()
    {
        $query = $this->dbClass->query('SELECT 
                        *
                    FROM
                        (SELECT cat.id AS Id, cat.Name AS CategoryName, 
                            (SELECT 
                                        COUNT(*)
                                    FROM
                                        Item_category_relations AS cat_relations
                                    WHERE
                                        cat_relations.categoryId = cat.id) AS TotalItems
                        FROM
                            category AS cat) relations
                    ORDER BY relations.TotalItems DESC');
        return $this->dbClass->fetchAll($query);
    }

    function solve2()
    {
        $query = $this->dbClass->query('SELECT 
                        *
                    FROM
                        (SELECT 
                            cat.id AS Id,
                                cat.Name AS CategoryName,
                                cat_relation.ParentcategoryId AS ParentCategoryId,
                                (SELECT 
                                        category.Name
                                    FROM
                                        category
                                    WHERE
                                        Id = cat_relation.ParentcategoryId) AS ParentCategoryName,
                                (SELECT 
                                        COUNT(*)
                                    FROM
                                        Item_category_relations AS cat_relations
                                    WHERE
                                        cat_relations.categoryId = cat.id) AS TotalItems
                        FROM
                            category AS cat
                        LEFT JOIN catetory_relations AS cat_relation ON cat.Id = cat_relation.categoryId) relations
                    ORDER BY relations.ParentcategoryId ASC');
        
        $result = $this->dbClass->fetchAll($query);

        return !empty($result) ? buildTree($result) : null;
    }
}


