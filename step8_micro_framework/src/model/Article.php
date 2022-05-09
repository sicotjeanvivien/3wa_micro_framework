<?php

class Article
{

    /** 
     * @var int $id 
     */
    private int $id;

    /**
     * @var string $content
     */
    private string $content;

    /** 
     * @var string|null $title 
     */
    private ?string $title;

    /**
     * @var string|null $published_date
     */
    private ?string $published_date;

    /**
     * Artcile constructor
     */
    public function __construct()
    {
    }

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
        $this->content = $content;
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
