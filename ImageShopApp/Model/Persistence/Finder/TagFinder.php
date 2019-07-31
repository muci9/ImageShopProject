<?php


namespace ImageShopApp\Model\Persistence\Finder;


use ImageShopApp\Model\DomainObject\Tag;

class TagFinder extends AbstractFinder
{
    public function findAllTags() : array
    {
        $sql = "SELECT * FROM tag";
        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tags = $this->translateToTagsArray($rows);
        return $tags;
    }

    private function translateToTag(array $row) : Tag
    {
        return new Tag($row['id'], $row['tag_name']);
    }

    private function translateToTagsArray(array $resultRows) : array
    {
        $tags = [];
        foreach ($resultRows as $row) {
            $tags[] = $this->translateToTag($row);
        }
        return $tags;
    }
}