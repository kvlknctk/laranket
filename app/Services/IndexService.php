<?php

    namespace App\Services;
    /*
        use App\Category;
        use App\News;*/

    use App\Poll;

    class IndexService
    {
        protected $categories;

        /*
                public function __construct(Category $category)
                {
                    $this->categories = $category;
                }*/

        public function pollsData()
        {
            $polls = Poll::get();

            return $polls;
        }


    }