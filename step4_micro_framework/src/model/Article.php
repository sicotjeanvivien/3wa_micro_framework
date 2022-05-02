<?php

class Article
{

    private int $id;

    private string $content;

    private string $title;

    private string $published_date;

    public function __construct() {
    }

    // public function __construct(int $id, string $content, string $title, string $published_date) {
    //     $this->id = $id;
    //     $this->content = $content;
    //     $this->title = $title;
    //     $this->published_date = $published_date;
    // }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->firstname = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPublishedDate(): string
    {
        return $this->published_date;
    }

    /**
     * @param string $published_date
     */
    public function setPublishedDate(string $published_date): void
    {
        $this->published_date = $published_date;
    }

}
