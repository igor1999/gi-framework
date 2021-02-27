<?php

namespace Job\Component\Base\View;

trait JobJSTrait
{
    /**
     * @return static
     * @throws \Exception
     */
    protected function addJobJS()
    {
        $target = $this->giCreateClassDirChildFile(JobJSTrait::class, 'web/js/job.js');
        $url    = 'Job/Component/Base/js/job.js';

        $this->addJS($target, $url);

        return $this;
    }
}