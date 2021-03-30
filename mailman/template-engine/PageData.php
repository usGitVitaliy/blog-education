<?php

namespace mailman\templateengine;

class PageData
{
    private string $pagePath;
    private string $titleContent;
    private string $mainContent;

    public function setPagePath(string $inputPagePath)
    {
        $this->pagePath = $inputPagePath;
    }

    public function setTitleContent(string $inputTitleContent)
    {
        $this->titleContent = $inputTitleContent;
    }

    public function setMainContent(string $inputMainContent)
    {
        $this->mainContent = $inputMainContent;
    }

    public function getTitleContent(): string
    {
        return $this->titleContent;
    }

    public function getMainContent(): string
    {
        return $this->mainContent;
    }

    public function getPagePath(): string
    {
        return $this->pagePath;
    }
}
