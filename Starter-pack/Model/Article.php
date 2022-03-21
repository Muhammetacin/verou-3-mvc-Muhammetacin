<?php

declare(strict_types=1);

class Article
{
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(string $title, ?string $description, ?string $publishDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    public function formatPublishDate($format = 'd-m-Y')
    {
        // d = day in number, D = day in text eg: Wed
        // m = month in number, M = month in text eg: Mar
        // Y = year in full number, y = year in 2 numbers eg 22

        // return the date in the required format
        return date($format, strtotime($this->publishDate));
    }
}