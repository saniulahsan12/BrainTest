<?php
function printArrayList($array)
{
        echo "<ul>";

    foreach ($array as $k => $v) {
        if (is_array($v['children'])) {
            echo "<li>" . $v['CategoryName'] . " (<b>" . $v['TotalItems'] . "</b>) </li>";
            printArrayList($v['children']);
            continue;
        }
        echo "<li>" . $v['CategoryName'] . " (<b>" . $v['TotalItems'] . "</b>) </li>";
    }

        echo "</ul>";
}

function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['ParentCategoryId'] == $parentId) {
            $children = buildTree($elements, $element['Id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}