<?php

    namespace App\Services;
    /*
        use App\Category;
        use App\News;*/

    use App\Adversite;
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

        public function pollId()
        {
            //dd(request()->segment(2));
            return request()->segment(2);

        }

       public function getAdversite()
        {
            if (count(Adversite::get())) {
                return array_random(Adversite::get()->toArray());
            }else {
                return;
            }
        }


    }